<?php

namespace common\models\startsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lbmzorx\components\event\SearchEvent;
use common\models\startdata\UserMessage as DataModel;

/**
 * UserMessage represents the model behind the search form of `UserMessage`.
 */
class UserMessage extends DataModel

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'send_id', 'to_id', 'user_message_group_content_id'], 'integer'],
            [['read', 'status', 'priority', 'send_type', 'is_link', 'content', 'link', 'group_type', 'message_type'], 'safe'],
            [['add_time'], 'string'],
            [['read'], 'in', 'range'=>array_keys( DataModel::$read_code ) ],
            [['status'], 'in', 'range'=>array_keys( DataModel::$status_code ) ],
            [['priority'], 'in', 'range'=>array_keys( DataModel::$priority_code ) ],
            [['send_type'], 'in', 'range'=>array_keys( DataModel::$send_type_code ) ],
            [['is_link'], 'in', 'range'=>array_keys( DataModel::$is_link_code ) ],
            [['group_type'], 'in', 'range'=>array_keys( DataModel::$group_type_code ) ],
            [['message_type'], 'in', 'range'=>array_keys( DataModel::$message_type_code ) ],
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
            'send_id' => $this->send_id,
            'to_id' => $this->to_id,
            'user_message_group_content_id' => $this->user_message_group_content_id,
        ]);

        $query->andFilterWhere(['like', 'read', $this->read])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'priority', $this->priority])
            ->andFilterWhere(['like', 'send_type', $this->send_type])
            ->andFilterWhere(['like', 'is_link', $this->is_link])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'group_type', $this->group_type])
            ->andFilterWhere(['like', 'message_type', $this->message_type]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
