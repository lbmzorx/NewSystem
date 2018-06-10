<?php
/**
 * Created by Administrator.
 * Date: 2018/6/10 18:28
 * github: https://github.com/lbmzorx
 */

namespace frontend\models;

use common\models\startdata\UserFans;
use lbmzorx\components\helper\ModelHelper;
use Yii;
use common\models\startdata\User;
use yii\base\Model;
class FansForm extends Model
{
    public $following_id;

    private $_isAttention;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['following_id','compare','compareValue'=>\yii::$app->user->id,'operator'=>'!=','message'=>\yii::t('app','Can not following yourself')],
            [['following_id'],'exist','targetClass'=>User::className(),'targetAttribute'=>'id'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'following_id' => Yii::t('model', 'Following Id'),
        ];
    }

    public function fans(){
        if( $attension=UserFans::findOne(['attention_id'=>$this->following_id,'fans_id'=>\yii::$app->user->id])){
            //取消关注
            $this->_isAttention=false;
            if($attension->delete() !==false){
                return true;
            }
        }else{ //关注
            $this->_isAttention=true;
            $attension=new UserFans();
            $attension->attention_id=$this->following_id;
            $attension->fans_id=\yii::$app->user->id;
            if($attension->validate() && $attension->save()){
                return true;
            }
        }
        $this->addError('following_id',ModelHelper::getErrorAsString($attension,$attension->getErrors()));
        return false;
    }

    public function getAttentionType(){
        return $this->_isAttention;
    }
}