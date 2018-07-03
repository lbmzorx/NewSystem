<?php
/**
 * Created by Administrator.
 * Date: 2018/6/30 12:58
 * github: https://github.com/lbmzorx
 */
use yii\helpers\Url;
return [
    [
        'send_id'=>2,
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
    ],
    [
        'send_id'=>1,
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
    ],
];