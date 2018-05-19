<?php

namespace common\models\adminsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lbmzorx\components\event\SearchEvent;
use common\models\admindata\AdminMessage as DataModel;

/**
 * AdminMessage represents the model behind the search form of `AdminMessage`.
 */
class AdminMessage extends DataModel

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'to_admin_id', 'from_admin_id'], 'integer'],
            [['spread_type', 'level', 'name', 'content', 'read', 'from_type'], 'safe'],
            [['add_time'], 'string'],
            [['spread_type'], 'in', 'range'=>array_keys( DataModel::$spread_type_code ) ],
            [['level'], 'in', 'range'=>array_keys( DataModel::$level_code ) ],
            [['read'], 'in', 'range'=>array_keys( DataModel::$read_code ) ],
            [['from_type'], 'in', 'range'=>array_keys( DataModel::$from_type_code ) ],
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
                'timeAttributes' =>['add_time'],
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
                ]
            ]
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
            'to_admin_id' => $this->to_admin_id,
            'from_admin_id' => $this->from_admin_id,
        ]);

        $query->andFilterWhere(['like', 'spread_type', $this->spread_type])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'read', $this->read])
            ->andFilterWhere(['like', 'from_type', $this->from_type]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
