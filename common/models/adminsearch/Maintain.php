<?php

namespace common\models\adminsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lbmzorx\components\event\SearchEvent;
use common\models\admindata\Maintain as DataModel;

/**
 * Maintain represents the model behind the search form of `Maintain`.
 */
class Maintain extends DataModel

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'options_type', 'sort'], 'integer'],
            [['show_type', 'name', 'value', 'sign', 'url', 'info', 'status'], 'safe'],
            [['add_time', 'edit_time'], 'string'],
            [['options_type'], 'in', 'range'=>array_keys( DataModel::$options_type_code ) ],
            [['status'], 'in', 'range'=>array_keys( DataModel::$status_code ) ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'searchTime'=>[
                'class'=>\lbmzorx\components\behavior\TimeSearch::className(),
                'timeAttributes' =>['add_time','edit_time'],
             ],
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
                ],
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
            'options_type' => $this->options_type,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'show_type', $this->show_type])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'sign', $this->sign])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'status', $this->status]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
