<?php
/**
 * Created  ParamInit.php.
 * Date: 2018/5/4 22:43
 * Emain: lbmzorx@163.com
 * Github: https://github.com/lbmzorx
 */
namespace frontend\init;

use yii;
use yii\base\Component;
class ParamInit extends Component
{
    public function init(){
        parent::init();
        $cache = yii::$app->getCache();
        $key = 'options';
        if (($data = $cache->get($key)) === false) {
            $data = Options::find()->where(['type' => Options::TYPE_SYSTEM])->orwhere([
                'type' => Options::TYPE_CUSTOM,
                'autoload' => Options::CUSTOM_AUTOLOAD_YES,
            ])->asArray()->indexBy("name")->all();
            $cacheDependencyObject = yii::createObject([
                'class' => FileDependencyHelper::className(),
                'rootDir' => '@backend/runtime/cache/file_dependency/',
                'fileName' => 'options.txt',
            ]);
            $fileName = $cacheDependencyObject->createFile();
            $dependency = new FileDependency(['fileName' => $fileName]);
            $cache->set($key, $data, 0, $dependency);
        }

        foreach ($data as $v) {
            $this->{$v['name']} = $v['value'];
        }
    }

    public static function webSetParams(){

    }
}