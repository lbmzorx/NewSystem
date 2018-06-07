<?php

namespace common\models\adminsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lbmzorx\components\event\SearchEvent;
use common\models\admindata\AdminMessageLog as DataModel;

/**
 * AdminMessageLog represents the model behind the search form of `AdminMessageLog`.
 */
class AdminMessageLog extends DataModel

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_message_id', 'admin_id'], 'integer'],
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
            'admin_message_id' => $this->admin_message_id,
            'admin_id' => $this->admin_id,
        ]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
