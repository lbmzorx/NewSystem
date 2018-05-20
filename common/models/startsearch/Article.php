<?php

namespace common\models\startsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lbmzorx\components\event\SearchEvent;
use common\models\startdata\Article as DataModel;

/**
 * Article represents the model behind the search form of `Article`.
 */
class Article extends DataModel

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'article_content_id', 'user_id', 'article_cate_id', 'sort', 'commit', 'view', 'collection', 'thumbup', 'admin_id'], 'integer'],
            [['title', 'author', 'cover', 'abstract', 'remain', 'auth', 'tag', 'level', 'score', 'publish', 'status', 'page_type', 'flag_headline', 'flag_recommend', 'flag_slide_show', 'flag_special_recommend', 'flag_roll', 'flag_bold', 'flag_picture', 'recycle'], 'safe'],
            [['add_time', 'edit_time'], 'string'],
            [['remain'], 'in', 'range'=>array_keys( DataModel::$remain_code ) ],
            [['auth'], 'in', 'range'=>array_keys( DataModel::$auth_code ) ],
            [['level'], 'in', 'range'=>array_keys( DataModel::$level_code ) ],
            [['publish'], 'in', 'range'=>array_keys( DataModel::$publish_code ) ],
            [['status'], 'in', 'range'=>array_keys( DataModel::$status_code ) ],
            [['page_type'], 'in', 'range'=>array_keys( DataModel::$page_type_code ) ],
            [['flag_headline'], 'in', 'range'=>array_keys( DataModel::$flag_headline_code ) ],
            [['flag_recommend'], 'in', 'range'=>array_keys( DataModel::$flag_recommend_code ) ],
            [['flag_slide_show'], 'in', 'range'=>array_keys( DataModel::$flag_slide_show_code ) ],
            [['flag_special_recommend'], 'in', 'range'=>array_keys( DataModel::$flag_special_recommend_code ) ],
            [['flag_roll'], 'in', 'range'=>array_keys( DataModel::$flag_roll_code ) ],
            [['flag_bold'], 'in', 'range'=>array_keys( DataModel::$flag_bold_code ) ],
            [['flag_picture'], 'in', 'range'=>array_keys( DataModel::$flag_picture_code ) ],
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
            'article_content_id' => $this->article_content_id,
            'user_id' => $this->user_id,
            'article_cate_id' => $this->article_cate_id,
            'sort' => $this->sort,
            'commit' => $this->commit,
            'view' => $this->view,
            'collection' => $this->collection,
            'thumbup' => $this->thumbup,
            'admin_id' => $this->admin_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'cover', $this->cover])
            ->andFilterWhere(['like', 'abstract', $this->abstract])
            ->andFilterWhere(['like', 'remain', $this->remain])
            ->andFilterWhere(['like', 'auth', $this->auth])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'score', $this->score])
            ->andFilterWhere(['like', 'publish', $this->publish])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'page_type', $this->page_type])
            ->andFilterWhere(['like', 'flag_headline', $this->flag_headline])
            ->andFilterWhere(['like', 'flag_recommend', $this->flag_recommend])
            ->andFilterWhere(['like', 'flag_slide_show', $this->flag_slide_show])
            ->andFilterWhere(['like', 'flag_special_recommend', $this->flag_special_recommend])
            ->andFilterWhere(['like', 'flag_roll', $this->flag_roll])
            ->andFilterWhere(['like', 'flag_bold', $this->flag_bold])
            ->andFilterWhere(['like', 'flag_picture', $this->flag_picture])
            ->andFilterWhere(['like', 'recycle', $this->recycle]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
