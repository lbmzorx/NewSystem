<?php
/**
 * Created by Administrator.
 * Date: 2018/6/13 21:03
 * github: https://github.com/lbmzorx
 */

namespace console\controllers;


use yii\console\Controller;

class SwooleMysqlConnectionController extends Controller
{
    protected $config=[
        'host'=>'',
        'port'=>'',
        'user'=>'',
        'password'=>'',
        'database'=>'',


    ];

    public $connections;

    public function init(){
        parent::init();
        $this->connections=new SqlQueue();


    }
}