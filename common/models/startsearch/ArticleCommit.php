<?php

namespace common\models\startsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lbmzorx\components\event\SearchEvent;
use common\models\startdata\ArticleCommit as DataModel;

/**
 * ArticleCommit represents the model behind the search form of `ArticleCommit`.
 */
class ArticleCommit extends DataModel

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'article_id', 'user_id', 'parent_id'], 'integer'],
            [['content', 'status', 'recycle', 'level', 'path'], 'safe'],
            [['add_time'], 'string'],
            [['status'], 'in', 'range'=>array_keys( DataModel::$status_code ) ],
            [['recycle'], 'in', 'range'=>array_keys( DataModel::$recycle_code ) ],
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
            'article_id' => $this->article_id,
            'user_id' => $this->user_id,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'recycle', $this->recycle])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'path', $this->path]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
