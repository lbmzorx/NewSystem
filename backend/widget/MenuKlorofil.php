<?php
/**
 * Created by Administrator.
 * Date: 2018/5/19 11:49
 * github: https://github.com/lbmzorx
 */

namespace backend\widget;

use common\models\admindata\Menu;
use lbmzorx\components\helper\TreeHelper;
use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\VarDumper;

class MenuKlorofil extends Widget
{
    public $top = '0';
    public $left = '';
    public $leftsub = '';
    public $leftleftsub = '';

    public $allpath = '';

    public $options = [];

    public $depency;
    public static $depency_filename = '@backend/runtime/depency/backend_menu.txt';

    /**
     * @var \yii\caching\FileCache
     */
    public $cache = '\yii\caching\FileCache';
    public $cacheOption = [];

    public $duration = 8640000; // 100 days

    /**
     * Initializes the pager.
     */
    public function init()
    {
        parent::init();
        $this->getCache();
    }

    public function getCache()
    {
        if (is_object($this->cache) == false) {
            if (is_string($this->cache) && class_exists($this->cache)) {
                $this->cache = Yii::createObject($this->cache, $this->cacheOption);
            } else {
                $this->cache = \yii::$app->cache;
            }
        }
        return $this->cache;
    }

    /**
     * Executes the widget.
     * This overrides the parent implementation by displaying the generated page buttons.
     */
    public function run()
    {
        echo $this->renderSide();
    }

    public function renderSide()
    {

        $cache = $this->getCache();
        $key = ['top', 'top' => $this->top, __METHOD__];
        $menu = $cache->get($key);
        $file=yii::getAlias(static::$depency_filename);
        if(!file_exists($file)){
            $path=StringHelper::dirname(yii::getAlias($file));
            if(!is_dir($path)){
                FileHelper::createDirectory($path);
            }
            try{
                $depanceFile=fopen($file,'w');
                fwrite($depanceFile, date("Y-m-d H:i:s").'-'.microtime(true));
                fclose($depanceFile);
            }catch (Exception $e){
            }
        }
        if (empty($menu)) {
            $menu = $this->getMenuSide();
            $dependency = new \yii\caching\FileDependency(['fileName' => $file]);
            $cache->set($key, $menu, $this->duration, $dependency);
        }

        $string = '';
        if ($menu) {
//            throw new \yii\db\Exception(VarDumper::dumpAsString($menu));
            foreach ($menu as $k => $v) {
                if (!empty($v['sub'])) {
                    $string .= '<li data-id=""><a href="#' . md5($v['url'] . $v['module']) . '" data-toggle="collapse"' .
                        'class="' . ($v['module'] == $this->left ? 'active' : 'collapsed') . '"' .
                        'aria-expanded="' . ($v['module'] == $this->left ? 'true' : 'false') . '">' .
                        '<i class="' . Html::encode($v['icon']) . '"></i>' .
                        '<span>' . Html::encode($v['name']) . '</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>' .
                        '<div id="' . md5($v['url'] . $v['module']) . '"' .
                        'class="' . ($v['module'] == $this->left ? 'collapse in' : 'collapse') . '">' .
                        '<ul class="nav">';
                    foreach ($v['sub'] as $vv) {
                        $string .= '<li><a href="' . Html::encode($vv['url']) . '" class="' . ($this->leftsub == $vv['controller'] ? 'active' : '') . '">' .
                            '<i class="' . Html::encode($vv['icon']) . '"></i>' .
                            Html::encode($vv['name']) . '</a></li>';
                    };
                    $string .= '</ul></div></li>';
                } else {
                    $string .= '<li><a href="' . Html::encode($v['url']) . '" class="' . ($this->left == $v['module'] ? 'active' : '') . '">' .
                        '<i class="' . Html::encode($v['icon']) . '"></i> <span>' . Html::encode($v['name']) . '</span></a></li>';
                }
            }
        }

        return $string;
    }

    /**
     *
     */
    public function getMenuSide()
    {
        $menu = Menu::find()->where([
            'is_display' => Menu::IS_DISPLAY_YES,
            'position' => Menu::POSITION_LEFT,
        ])->andFilterWhere(['top_id' => $this->top])->orderBy(['sort' => SORT_ASC, 'id' => SORT_ASC])->asArray()->all();

        return TreeHelper::array_cate_as_subarray($menu, 0, 'parent_id');
    }
}