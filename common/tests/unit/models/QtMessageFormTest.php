<?php

namespace common\tests\unit\models;

use common\fixtures\QtMessageFormFixture;
use common\models\startmq\QtMessageForm;
use Yii;
use common\fixtures\UserFixture;
use yii\helpers\Url;

/**
 * Login form test
 */
class QtMessageFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;


    /**
     * @return array
     */
    public function _fixtures()
    {
        return [
            'qtmessage' => [
                'class' => QtMessageFormFixture::className(),
                'dataFile' => codecept_data_dir() . '/startmq/QtMessageForm.php'
            ]
        ];
    }

    public function testLoginNoUser()
    {
        $model = new QtMessageForm([
            'send_id'=>3,
            'to_id'=>9,
            'priority'=>2,
            'send_type'=>2,
            'is_link'=>1,
            'content'=>'test aa',
            'link'=>Url::to(['a']),
            'add_time'=>time(),
            'group_type'=>0,
            'message_type'=>1,
            'user_message_group_content_id'=>'',
        ]);

        expect('model should not login user', $model->sendRedis())->false();
        expect('user should not be logged in', $model->sendRabbit())->true();
    }

}
