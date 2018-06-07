<?php

namespace common\models\startsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lbmzorx\components\event\SearchEvent;
use common\models\startdata\Options as DataModel;

/**
 * Options represents the model behind the search form of `Options`.
 */
class Options extends DataModel

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'input_type', 'autoload', 'sort'], 'integer'],
            [['name', 'value', 'tips'], 'safe'],
            [['type'], 'in', 'range'=>array_keys( DataModel::$type_code ) ],
            [['input_type'], 'in', 'range'=>array_keys( DataModel::$input_type_code ) ],
            [['autoload'], 'in', 'range'=>array_keys( DataModel::$autoload_code ) ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DataModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                    'sort' => SORT_ASC,
                ]
            ],
            'pagination'=>[
               'pageParam'=>'page',
               'pageSizeParam'=>'per-page',
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
            'input_type' => $this->input_type,
            'autoload' => $this->autoload,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'tips', $this->tips]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
