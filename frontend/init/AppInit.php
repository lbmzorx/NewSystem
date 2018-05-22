<?php
/**
 * Created  ParamInit.php.
 * Date: 2018/5/4 22:43
 * Emain: lbmzorx@163.com
 * Github: https://github.com/lbmzorx
 */
namespace frontend\init;

use common\models\startdata\Options;
use yii;
use yii\base\Component;
class AppInit extends Component
{

    public static function sets($event){
        static::setAppParams();
    }


    public static function setAppParams(){
        $cache = yii::$app->getCache();
        $key = 'options';
        if (($data = $cache->get($key)) === false) {
            $data = Options::find()->select('name,value')->where([
                'type' =>[ Options::TYPE_SYSTEM,Options::TYPE_SELF],
                'autoload' => Options::AUTOLOAD_YES,]
            )->asArray()->all();

            $cache->set($key, $data, 86400*(10+rand(1,10)), new yii\caching\TagDependency([
                'tags'=>Options::CACHE_TAG,
            ]));
        }
        foreach ($data as $v) {
            \yii::$app->params[$v['name']]=$v['value'];
        }
    }



}