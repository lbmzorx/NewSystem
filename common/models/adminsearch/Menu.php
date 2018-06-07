<?php

namespace common\models\adminsearch;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use lbmzorx\components\event\SearchEvent;
use common\models\admindata\Menu as DataModel;

/**
 * Menu represents the model behind the search form of `Menu`.
 */
class Menu extends DataModel

{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'top_id'], 'integer'],
            [['position', 'name', 'url', 'icon', 'target', 'is_absolute_url', 'is_display', 'recycle', 'module', 'controller', 'action'], 'safe'],
            [['sort'], 'number'],
            [['add_time', 'edit_time'], 'string'],
            [['position'], 'in', 'range'=>array_keys( DataModel::$position_code ) ],
            [['target'], 'in', 'range'=>array_keys( DataModel::$target_code ) ],
            [['is_absolute_url'], 'in', 'range'=>array_keys( DataModel::$is_absolute_url_code ) ],
            [['is_display'], 'in', 'range'=>array_keys( DataModel::$is_display_code ) ],
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
            'parent_id' => $this->parent_id,
            'sort' => $this->sort,
            'top_id' => $this->top_id,
        ]);

        $query->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'is_absolute_url', $this->is_absolute_url])
            ->andFilterWhere(['like', 'is_display', $this->is_display])
            ->andFilterWhere(['like', 'recycle', $this->recycle])
            ->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'controller', $this->controller])
            ->andFilterWhere(['like', 'action', $this->action]);
        $this->trigger(SearchEvent::BEFORE_SEARCH, new SearchEvent(['query'=>$query]));
        return $dataProvider;
    }
}
