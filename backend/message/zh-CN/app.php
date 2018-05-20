<?php
/**
* This is the translation array tt
*
*/
return [
    'backend'=>'后台',
	'frontend'=>'前台',//0左，1上',
    'yes'=>'是',
    'no'=>'否',
    'Ok'=>'确定',
    'Cancel'=>'取消',
    'Please Select'=>'请选择',
    'Batch Deletes'=>'批量删除',
    'left'=>'左',
    'top'=>'上',
    'ok'=>'确定',
    'cancel'=>'取消',
    'Update'=>'更新',
    'Delete'=>'删除',

    'Edit success'=>'修改成功',
    'Invalid id'=>'无效',

    'Save'=>'保存',
    'Menus'=>'菜单',
    'Create Menu'=>'创建菜单',
    'Update Menu'=>'编辑菜单',
    'Update Menu: {nameAttribute}'=>'更新菜单: {nameAttribute}',
    'Batch Update {name}'=>'批量修改{name}',
    'At least Choose One to update!'=>'更新记录至少要选择一条！',
    'Are you want to update ?'=>'您确实想更新吗？',
    'At least Choose One to Delete!'=>'删除需要至少选择一条！',

    'Articles'=>'文章',
	/*start*Article*/
	'Un remain' =>'未提醒',//'remain'=0, 提醒.0未提醒，1已经提醒
	'Remained' =>'已提醒',//'remain'=1, 提醒.0未提醒，1已经提醒
	'All users' =>'所有人',//'auth'=0, 权限.0所有人，1好友，2加密，3自己
	'Friends' =>'好友',//'auth'=1, 权限.0所有人，1好友，2加密，3自己
	'Encode' =>'加密',//'auth'=2, 权限.0所有人，1好友，2加密，3自己
	'Private' =>'自己',//'auth'=3, 权限.0所有人，1好友，2加密，3自己
	'Draft' =>'草稿',//'publish'=0, 发布.0草稿,1发布
	'Published' =>'发布',//'publish'=1, 发布.0草稿,1发布
	'Waiting Audit' =>'待审核',//'status'=0, 状态值.0待审核,1审核通过,2正在审核,3审核不通过
	'Audit Pass' =>'审核通过',//'status'=1, 状态值.0待审核,1审核通过,2正在审核,3审核不通过
	'Auditing' =>'正在审核',//'status'=2, 状态值.0待审核,1审核通过,2正在审核,3审核不通过
	'Audit Failed' =>'审核不通过',//'status'=3, 状态值.0待审核,1审核通过,2正在审核,3审核不通过
	'Garbage' =>'垃圾',//'level'=0, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
	'Non nutritive' =>'较差',//'level'=1, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
	'General' =>'普通',//'level'=2, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
	'Better' =>'较好',//'level'=3, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
	'Good' =>'优秀',//'level'=4, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
	'Genius' =>'天才',//'level'=5, 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
/*end*Article*/

    /*Article*start*/
    'User Name'=>'用户名',
    'Cate Name'=>'分类',
    /*Article*end*/

    /*start*ArticleCate*/
    'Unavailable' =>'未开启',//'status'=0, 状态.0未开启，1启用
    'Enable' =>'启用',//'status'=1, 状态.0未开启，1启用
    /*end*ArticleCate*/

    /*start*ArticleCommit*/
    'Waiting audit' =>'待审核',//'status'=0, 状态，0，已发表，1评论成功，3非法评论，2审核不通过
//    'Audit Pass' =>'评论成功',//'status'=1, 状态，0，已发表，1评论成功，3非法评论，2审核不通过
//    'Audit Failed' =>'非法评论',//'status'=2, 状态，0，已发表，1评论成功，3非法评论，2审核不通过
    'Commit'=>'评论',
    /*end*ArticleCommit*/

    'Upload only support post data'=>'上传文件仅仅支持',
    'Upload Image'=>'上传图片',
    'Failed Upload'=>'上传失败',
    'Retry'=>'重试',
    'Created Success'=>'添加成功',
    'Success'=>'成功',
    'Error'=>'失败',
    'Created Error'=>'添加错误',
    'Edit Success!'=>'修改成功',
    'Invalid Parameter'=>'无效参数',
    'error'=>'错误',

    'Create Article'=>'添加文章',
    'Update Success'=>'更新成功',
    'Login Success!'=>'登录成功',
    'Warning'=>'警告',

    /*start*Options*/
    'system' =>'系统',//'type'=0, 类型.0系统,1自定义,2banner,3广告
    'self' =>'自定义',//'type'=1, 类型.0系统,1自定义,2banner,3广告
    'banner' =>'Banner',//'type'=2, 类型.0系统,1自定义,2banner,3广告
    'ad' =>'广告',//'type'=3, 类型.0系统,1自定义,2banner,3广告
    'input' =>'输入框',//'input_type'=0, 输入框类型
    'texteare' =>'文本框',//'input_type'=1, 输入框类型
    'img' =>'图片',//'input_type'=2, 输入框类型
    'markdown' =>'Markdown',//'input_type'=3, 输入框类型

    'Website Setting'=>'网站设置',
    'Seo Keywords' => 'seo关键字',
    'Website Title' => '网站标题',
    'Website Description' => '网站描述',
    'Website Email' => '联系邮箱',
    'Website Language' => '站点语言',
    'Icp Sn' => 'ICP备案号',
    'Statics Script' => '统计代码',
    'Website Status' => '站点状态',
    'Website Timezone' => '时区设置',
    'Open Comment' => '开启评论',
    'Open Comment Verify' => '开启评论审核',
    'Website Url' => '网站域名',

    'Seo Setting' => 'Seo设置',
    'Input Type' => '输入框类型',
    'Autoload' => '自动加载',
    'Tips' => '提示',
    'Custom Setting' => '自定义设置',
    'Must begin with alphabet and can only includes alphabet,_,and number' => '必须以字母开头,只能包含字母和数字及下划线',
    'Opened' => '开放',
    'Closed' => '关闭',
    'SMTP Host' => 'SMTP地址',
    'SMTP Port' => 'SMTP端口',
    'SMTP Username' => 'SMTP用户名',
    'SMTP Password' => 'SMTP密码',
    'Sender' => '发件人',
    'Encryption' => '连接类型',
    'SMTP Setting' => 'SMTP设置',
    'Test' => '测试',
    'Type restrict, please type in after create' => '类型受限，请创建完成后再录入值',
    'open'=>'开放',
    'close'=>'关闭',
    'Seo Description'=>'SEO描述',
    /*end*Options*/
    /*start*Error*/
    'The above error occurred while the Web server was processing your request.'=>'Web请求过程中发生了错误。',
    'Please contact us if you think this is a server error. Thank you.'=>'如果是系统错误请联系我们，谢谢。',
    'Internal Server Error (#500)'=>'错误 (#500)',
    'Base Setting'=>'基本设置',
    'Smtp Setting'=>'SMTP邮件设置',
    'Reset'=>'重置',
    'Create Custom Setting'=>'添加自定义设置',
    'Update Options: {nameAttribute}'=>'更新设置 :{nameAttribute}',
    'Options'=>'设置',
    'Are you want to delete these items?'=>'您确定删除这些项？',
    'Not Found (#404)'=>'找不到页面(#404)',

    'Admin Logs'=>'管理员日志',
    'Admin user'=>'管理员',
    'through'=>'通过',
    'created'=>'添加',
    'updated'=>'更新',
    'deleted'=>'删除',
    'id'=>'ID',
    'record'=>'记录',


    /*start*Maintain*/
    'Index Banner' =>'首页轮播',//'position_type'=0, 位置类型.0首页轮播,1侧栏1,2侧栏2
    'Side Banner' =>'侧栏轮播',//'position_type'=1, 位置类型.0首页轮播,1侧栏1,2侧栏2
    'Firm Ad' =>'固定广告',//'position_type'=2, 位置类型.0首页轮播,1侧栏1,2侧栏2
    'Image' =>'图片',//'show_type'=0, 显示类型.0图片,2文字,3markdown
    'Text' =>'文本',//'show_type'=1, 显示类型.0图片,2图片,3markdown
    'Markdown' =>'Markdown',//'show_type'=2, 显示类型.0图片,2文字,3markdown
    'Maintains'=>'运营',
    'Create Maintain'=>'添加运营信息',
    'Create Banner'=>'添加Banner',
    'Turn Into'=>'进入',
    'Available' =>'启用',//'status'=1, 状态.0禁用,1启用
    /*end*Maintain*/

    'Create Permission'=>'添加权限',
    'Permissions'=>'权限',
    'New Input'=>'新建',
    'Build From Select'=>'选择',
    'Permission exists'=>'权限已存在',
    'Role exists'=>'角色已存在',
    'Cannot find permission {name}'=>'不能找出{name}的权限',
    'Must begin with "/" like "/module/controller/action" format'=>'必须以"/"开头，例如"/module/controller/action"',
    'Roles'=>'角色',
    'Create Role'=>'添加角色',
    'All Permissions'=>'所有权限',
    'Delete must be POST http method'=>'删除请求必须是POST方法',
    'Update Permission: {nameAttribute}'=>'更新权限: {nameAttribute}',


    /*start*Log*/
    'All' =>'所有',//'level'=0, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
    //'Error' =>'',//'level'=1, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
    //'Warning' =>'',//'level'=2, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
    'info' =>'信息',//'level'=4, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
    'tracing' =>'追踪',//'level'=8, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
    'Profile' =>'Profile',//'level'=32, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
    'Profile Begin' =>'Profile Begin',//'level'=40, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
    'Profile End' =>'Profile End',//'level'=48, 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
    /*end*Log*/

    /*start*Admin*/
    //'Delete' =>'',//'status'=0, 状态
    'Frozen' =>'冻结',//'status'=1, 状态
    //'Audit Failed' =>'',//'status'=2, 状态
    'Limit Login' =>'限制登录',//'status'=3, 状态
    'Limit Active' =>'限制活动',//'status'=4, 状态
    'Login Error' =>'登录错误',//'status'=5, 状态
    'Active Error' =>'活动错误',//'status'=6, 状态
    'Active' =>'活动',//'status'=10, 状态
    'Create Admin'=>'添加管理员',
    'Admins'=>'管理员',
    /*end*Admin*/

    /*start*AdminMessage*/
    'Broadcast' =>'广播',//'spread_type'=0, 消息类型.0=广播,1组,3私信
    'Group' =>'组',//'spread_type'=1, 消息类型.0=广播,1组,3私信
    'Personal' =>'私信',//'spread_type'=2, 消息类型.0=广播,1组,3私信
    'Normal' =>'一般',//'level'=0, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
    'Info' =>'信息',//'level'=1, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
    //'Warning' =>'警告',//'level'=2, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
    'Danger' =>'危机',//'level'=3, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
    'Important' =>'重大',//'level'=4, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
    'Emergency' =>'紧急',//'level'=5, 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
    'Unread' =>'未读',//'read'=0, 已读.0未读,1已读
    'Read' =>'已读',//'read'=1, 已读.0未读,1已读
    'Administrator' =>'管理员',//'from_type'=0, 来源类型.0管理员,1用户,2路人,10操作系统,11其他
    'User' =>'用户',//'from_type'=1, 来源类型.0管理员,1用户,2路人,10操作系统,11其他
    'Guest' =>'游客',//'from_type'=2, 来源类型.0管理员,1用户,2路人,10操作系统,11其他
    'Operation System' =>'操作系统',//'from_type'=10, 来源类型.0管理员,1用户,2路人,10操作系统,11其他
    'Other' =>'其他',//'from_type'=100, 来源类型.0管理员,1用户,2路人,10操作系统,11其他
    'Message'=>'消息',
    'Create Admin Message'=>'添加消息',
    /*end*AdminMessage*/

    /*start*AdminInfo*/
    'Unreal Name' =>'未实名',//'status'=0, 状态.0未实名,1已实名
    'Real Name' =>'实名',//'status'=1, 状态.0未实名,1已实名
    'Female' =>'女',//'sex'=0, 性别.0女,1男
    'male' =>'男',//'sex'=1, 性别.0女,1男
    'Admin Messages'=>'管理员管理',
    'Index Admin Message'=>'管理员信息',
    'My Profile'=>'我的资料',
    'Logout'=>'退出',
    'Settings'=>'设置',
    /*end*AdminInfo*/

    'Help'=>'帮助',
    'More Messages'=>'更多消息',
    'Error Get Messages'=>'获取消息错误',
    'First'=>'首页',
    'Next'=>'下一页',
    'Prev'=>'上一页',
    'Last'=>'尾页',
    'Jump' =>'跳转',
    'PageSize' =>'设置',
    'Login to your account'=>'请登录',
    'Login'=>'登录',
    'Remember Me'=>'记住我',
    'Success Login'=>'登录成功',

    /*start*NameCommon*/
    'No'=>'否',
    'Yes'=>'是',
    /*end*NameCommon*/

    /*start*Admin*/
//    'Delete'=>'删除',
    'Freeze'=>'冻结',
//    'Waiting audit'=>'未通过审核',
//    'Limit Login'=>'限制登录',
//    'Limit Active'=>'限制活动',
//    'Login Error'=>'登录异常',
//    'Active Error'=>'激活失败',
    'Waiting Active'=>'未激活',
//    'Active'=>'正常',
    /*end*Admin*/

    /*start*AdminInfo*/
//    'Female'=>'女',
    'Male'=>'男',
    'Un Real Name'=>'未实名',
//    'Real Name'=>'已实名',
    /*end*AdminInfo*/

    /*start*AdminMessage*/
//    'Broadcast'=>'广播',
//    'Group'=>'组',
//    'Private'=>'私信',
    'Nomal'=>'一般',
    '1Star'=>'1星',
    '2Star'=>'2星',
    '3Star'=>'3星',
    '4Star'=>'4星',
    '5Star'=>'5星',
//    'Unread'=>'未读',
//    'Read'=>'已读',
    'Admin'=>'管理员',
//    'User'=>'用户',
//    'Guest'=>'路人',
    'Operate System'=>'操作系统',
//    'Other'=>'其他',
    /*end*AdminMessage*/

    /*start*Log*/
//    'All'=>'所有',
//    'Error'=>'致命错误',
//    'Warning'=>'警告',
//    'Info'=>'信息',
//    'Trace'=>'追踪',
    'PROFILE'=>'PROFILE',
    'PROFILE_BEGIN'=>'PROFILE_BEGIN',
    'PROFILE_END'=>'PROFILE_END',
    /*end*Log*/

    /*start*Maintain*/
    'Home Carousel figure'=>'首页轮播',
    'Left Side'=>'侧栏1',
    'Right Side'=>'侧栏',
    'Forbbiden'=>'禁用',
//    'Available'=>'启用',
    /*end*Maintain*/

    /*start*Menu*/
    'Left'=>'左',
    'Top'=>'上',
    'Right'=>'右',
    'Botton'=>'下',
    'New Tag'=>'新窗口',
    'Self Window'=>'本窗口',
    /*end*Menu*/

    'Unfolding Search Condition'=>'展开搜索条件',

    'Create {modelname}'=>'添加{modelname}',
    /*start*ModelNames*/
//    'Articles'=>'文章',
    'Article Cates'=>'文章分类',
    'Article Collections'=>'文章收藏',
    'Article Commits'=>'文章评论',
    'Article Contents'=>'文章内容',
    'Article Thumbups'=>'文章点赞',
//    'Menus'=>'菜单',
    'Migrations'=>'迁移',

    'Admin Infos'=>'管理员信息',
    'Admin Logs'=>'管理员记录',
    'Admin Message'=>'管理员消息',
    'Admin Message Logs'=>'管理员消息记录',
    'Auth Assignments'=>'授权分配',
    'Auth Items'=>'权限项目',
    'Auth Item Childs'=>'权限关系',
    'Auth Rules'=>'权限规则',
    'Logs'=>'日志',
//    'Maintains'=>'运营',

    'Tags'=>'标签',
    /*end*ModelNames*/
	/*start*ModelName*/
	'Article'=>'文章',
	'Article Cate'=>'文章分类',
	'Article Collection'=>'文章收藏',
	'Article Commit'=>'文章评论',
	'Article Content'=>'文章内容',
	'Article Thumbup'=>'文章点赞',
	'Menu'=>'菜单',
	'Migration'=>'迁移',
	
	'Admin Info'=>'管理员信息',
	'Admin Log'=>'管理员记录',
	'Admin Message'=>'管理员消息',
	'Admin Message Log'=>'管理员消息记录',
	'Auth Assignment'=>'授权分配',
	'Auth Item'=>'权限项目',
	'Auth Item Child'=>'权限关系',
	'Auth Rule'=>'权限规则',
	'Log'=>'日志',
	'Maintain'=>'运营',
	
	'Tag'=>'标签',
	/*end*ModelName*/
];