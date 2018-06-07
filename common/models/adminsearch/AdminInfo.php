<?php

namespace common\models\adminsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lbmzorx\components\event\SearchEvent;
use common\models\admindata\AdminInfo as DataModel;

/**
 * AdminInfo represents the model behind the search form of `AdminInfo`.
 */
class AdminInfo extends DataModel

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'admin_id'], 'integer'],
            [['real_name', 'sex', 'birthday', 'province', 'city', 'county', 'address', 'identified_card', 'status', 'qq', 'wechat', 'weibo', 'other_mongodb'], 'safe'],
            [['add_time', 'edit_time'], 'string'],
            [['sex'], 'in', 'range'=>array_keys( DataModel::$sex_code ) ],
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
            'admin_id' => $this->admin_id,
        ]);

        $query->andFilterWhere(['like', 'real_name', $this->real_name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'birthday', $this->birthday])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'county', $this->county])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'identified_card', $this->identified_card])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'qq', $this->qq])
            ->andFilterWhere(['like', 'wechat', $this->wechat])
            ->andFilterWhere(['like', 'weibo', $this->weibo])
            ->andFilterWhere(['like', 'other_mongodb', $this->other_mongodb]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
