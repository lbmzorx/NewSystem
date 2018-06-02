<?php
/**
 * Created by Administrator.
 * Date: 2018/6/2 18:42
 * github: https://github.com/lbmzorx
 */
namespace backend\models;

use common\models\admindata\AdminLog;
use common\models\admindata\YiiLog;
use yii\base\Model;
use yii\db\Connection;

class Truncate extends Model
{
    public $db;
    public $table;

    public function rules()
    {
        return [
            [['db','table'],'required'],
            [['db','table'],'string'],
            ['db','verifyDb'],
            ['table','in','range'=>[YiiLog::tableName(),AdminLog::tableName()]],
        ]; // TODO: Change the autogenerated stub
    }
    
    public function verifyDb($attribue){
        if(\yii::$app->has($this->db) && (\yii::$app->get($this->db) instanceof Connection)){
            return true;
        }
        $this->addError('db','There is no database {db} connection!',['db'=>$this->db]);
        return false;
    }
    
    /**
     * trancate table
     * @return bool
     */
    public function trancate(){
        if(\yii::$app->get($this->db)->createCommand()->truncateTable($this->table)->execute()!==false){
            return true;
        }
        $this->addError('table',\yii::t('app','Can\'t truncate {table}',['table'=>$this->table]));
        return false;
    }
}