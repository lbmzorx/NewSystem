<?php

use yii\db\Schema;

class m180601_220906_start extends \yii\db\Migration
{

    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'article', $tables))  {
        $this->createTable('{{%article}}', [
              'id' => $this->bigPrimaryKey(),
              'article_content_id' => $this->bigInteger(20)->notNull()->comment('文章内容'),
              'user_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('用户ID'),
              'article_cate_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('分类ID'),
              'sort' => $this->integer(11)->notNull()->defaultValue(0)->comment('排序'),
              'title' => $this->string(50)->notNull()->comment('标题'),
              'author' => $this->string(255)->notNull()->comment('作者'),
              'cover' => $this->string(255)->defaultValue('')->comment('封面'),
              'abstract' => $this->string(255)->notNull()->defaultValue('')->comment('摘要'),
              'remain' => $this->tinyInteger(4)->notNull()->defaultValue(0)->comment('提醒.code:0=Not Reminding,1=Remained.tran:0=未提醒，1=已提醒'),
              'auth' => $this->tinyInteger(4)->notNull()->defaultValue(0)->comment('权限.tran:0=所有人,1=好友,2=加密,3=自己.code:0=All Users,1=Friend,2=Encrypt,3=Private'),
              'tag' => $this->string(20)->notNull()->defaultValue('')->comment('标签'),
              'commit' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('评论'),
              'view' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('浏览'),
              'collection' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('收藏'),
              'thumbup' => $this->integer(11)->notNull()->defaultValue(0)->comment('赞'),
              'level' => $this->tinyInteger(4)->notNull()->defaultValue(2)->comment('文章级别.tran:0=垃圾,1=较差,2=普通,3=较好,4=优秀,5=天才.code:0=Garbage,1=Non nutritive,2=General,3=Better,4=Good,5=Genius.'),
              'score' => $this->tinyInteger(4)->notNull()->defaultValue(0)->comment('评分'),
              'publish' => $this->tinyInteger(4)->notNull()->defaultValue(1)->comment('发布.tran:0=草稿,1=发布.code:0=Unpublished,1=Published.'),
              'status' => $this->tinyInteger(4)->notNull()->defaultValue(0)->comment('状态值.tran:0=待审核,1=审核通过,2=正在审核,3=审核不通过.code:0=Waiting Audit,1=Audit Passed,2=Auditing,3=Audit Failed.'),
              'page_type' => $this->tinyInteger(4)->notNull()->defaultValue(0)->comment('显示类型.tran:0=多页,1=单页.code:0=Multi Pages,1=Single Page'),
              'add_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('添加时间'),
              'edit_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('编辑时间'),
              'flag_headline' => $this->tinyInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('头条.tran:0=否,1=是.code:0=No,1=Yes.'),
              'flag_recommend' => $this->tinyInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('推荐.tran:0=否,1=是.code:0=No,1=Yes.'),
              'flag_slide_show' => $this->tinyInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('幻灯.tran:0=否,1=是.code:0=No,1=Yes.'),
              'flag_special_recommend' => $this->tinyInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('特别推荐.tran:0=否,1=是.code:0=No,1=Yes.'),
              'flag_roll' => $this->tinyInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('滚动.tran:0=否,1=是.code:0=No,1=Yes.'),
              'flag_bold' => $this->tinyInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('加粗.tran:0=否,1=是.code:0=No,1=Yes.'),
              'flag_picture' => $this->tinyInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('图片.tran:0=否,1=是.code:0=No,1=Yes.'),
              'recycle' => $this->tinyInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('删除.tran:0=否,1=是.code:0=No,1=Yes.'),
              'admin_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('管理员ID'),
        ], $tableOptions);
        $this->batchInsert('{{%article}}', ['id','article_content_id','user_id','article_cate_id','sort','title','author','cover','abstract','remain','auth','tag','commit','view','collection','thumbup','level','score','publish','status','page_type','add_time','edit_time','flag_headline','flag_recommend','flag_slide_show','flag_special_recommend','flag_roll','flag_bold','flag_picture','recycle','admin_id'],
        [
          	['6','70','1','1','0','asdfasfasf','orx','','','0','0','asdfasfdas','7','178','1','1','2','0','1','1','0','1527392249','1527421656','0','0','0','0','0','0','0','0','1'],
          	['5','66','0','1','0','阿萨德发送','阿萨德发送发送','/upload/img/5ae8b12d31f8e558bddcfb515d52035e.png','阿萨德发生发生发','0','0','阿萨德发送到发达省份三大','0','0','0','0','2','0','1','0','0','1527093406','0','0','0','0','0','0','0','0','0','1'],
          	['2','1233','234','12','123','asdfsadf','11','safd','adffasd','0','1','asdf','0','0','0','0','2','0','1','1','0','1526209464','1526395077','0','0','0','0','0','0','0','0','0'],
          	['1','1','1','16','6','sdfsafa','sdfasfsf','http://www.chongloua.com/upload/img/eedd49bd0c6de401ae0770d919070b10.png','asdfdasfsa','0','3','','0','46','0','0','3','0','0','1','1','0','1526212471','0','1','1','1','1','0','0','0','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article_cate', $tables))  {
        $this->createTable('{{%article_cate}}', [
              'id' => $this->primaryKey(),
              'name' => $this->string(50)->notNull()->defaultValue('')->comment('名称'),
              'parent_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('父级ID'),
              'add_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('添加时间'),
              'edit_time' => $this->integer(11)->notNull()->defaultValue(0)->comment('修改时间'),
              'level' => $this->tinyInteger(4)->notNull()->comment('级别'),
              'path' => $this->string(255)->notNull()->defaultValue('0')->comment('路径'),
              'status' => $this->tinyInteger(4)->notNull()->defaultValue(0)->comment('状态.tran:0=可用,1=不可用,2=回收.code:0=Avaliable,1=Unavaliable,3=Recycle.'),
              'sort' => $this->integer(11)->notNull()->defaultValue(0)->comment('排序'),
        ], $tableOptions);
        $this->batchInsert('{{%article_cate}}', ['id','name','parent_id','add_time','edit_time','level','path','status','sort'],
        [
          	['5','linux','0','1527162338','0','0','0','0','0'],
          	['4','mysql','0','1527162327','0','0','0','0','0'],
          	['3','php','0','1526399120','1526808802','0','0','0','0'],
          	['1','docker','0','1523801219','1527162316','0','0','0','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article_cate` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article_collection', $tables))  {
        $this->createTable('{{%article_collection}}', [
              'id' => $this->primaryKey(),
              'article_id' => $this->integer(11)->notNull()->unsigned()->comment('文章ID'),
              'user_id' => $this->integer(11)->notNull()->unsigned()->comment('用户ID'),
              'add_time' => $this->integer(11)->notNull()->unsigned()->comment('添加时间'),
        ], $tableOptions);
        $this->batchInsert('{{%article_collection}}', ['id','article_id','user_id','add_time'],
        [
          	['10','6','1','1527423346'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article_collection` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article_commit', $tables))  {
        $this->createTable('{{%article_commit}}', [
              'id' => $this->primaryKey(),
              'article_id' => $this->integer(11)->notNull()->unsigned()->comment('文章ID'),
              'user_id' => $this->integer(11)->notNull()->unsigned()->comment('用户ID'),
              'parent_id' => $this->integer(11)->notNull()->unsigned()->comment('父级ID'),
              'content' => $this->string(400)->notNull()->comment('内容'),
              'status' => $this->tinyInteger(4)->notNull()->unsigned()->defaultValue(1)->comment('状态.tran:0=待审核,1=评论成功,2=审核失败.code:0=Waiting audit,1=Audit Pass,2=Audit Failed.'),
              'add_time' => $this->integer(11)->notNull()->unsigned()->comment('添加时间'),
              'recycle' => $this->tinyInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('删除.tran:0=否,1=是.code:0=No,1=Yes.'),
              'level' => $this->tinyInteger(4)->notNull()->defaultValue(0)->comment('级别'),
              'path' => $this->string(255)->notNull()->defaultValue('0')->comment('路径'),
        ], $tableOptions);
        $this->batchInsert('{{%article_commit}}', ['id','article_id','user_id','parent_id','content','status','add_time','recycle','level','path'],
        [
          	['7','6','1','2','三大发生发啊岁的发撒地方阿萨德发是','1','1527607939','0','1','0,2'],
          	['6','6','1','4','阿萨德发送到阿萨德发送','1','1527607919','0','2','0,2,4'],
          	['5','6','1','4','撒旦发射反阿萨德发达省份','1','1527607904','0','2','0,2,4'],
          	['4','6','1','2','阿斯短发散发岁的阿萨德发达省份的','1','1527607484','0','1','0,2'],
          	['3','6','1','0','asdfasfasdfsdafasdfadsfdasfssssssssssssfsdfasfasdfasdfsda','1','1527602798','0','0','0'],
          	['2','6','1','0','asdfasdfasdfsfsdfs','1','1527602790','0','0','0'],
          	['1','6','1','0','asdfasdfdasfsa','1','1527602612','0','0','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article_commit` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article_content', $tables))  {
        $this->createTable('{{%article_content}}', [
              'id' => $this->bigPrimaryKey(),
              'content' => $this->text()->notNull()->comment('内容'),
              'seo_title' => $this->string(255)->notNull()->defaultValue('')->comment('seo标题'),
              'seo_keywords' => $this->string(255)->notNull()->defaultValue('')->comment('seo关键字'),
              'seo_description' => $this->string(255)->notNull()->defaultValue('')->comment('seo描述'),
        ], $tableOptions);
        $this->batchInsert('{{%article_content}}', ['id','content','seo_title','seo_keywords','seo_description'],
        [
          	['70','asdfasfasdf\n\nasdf\nasdf\nasdf\nsad\nfasd\nfdasfdas','','',''],
          	['66','阿萨德发送发送到发达省份打算发达省份','阿萨德发送','阿萨德发大水','阿萨德发生发生发打算'],
          	['62','aslkdfjklas','','',''],
          	['61','fasdfasdfdasfdasf','asdf','asdf','asdf'],
          	['60','fasdfasdfdasfdasf','asdf','asdf','asdf'],
          	['59','fasdfasdfdasfdasf','asdf','asdf','asdf'],
          	['58','fasdfasdfdasfdasf','asdf','asdf','asdf'],
          	['57','fasdfasdfdasfdasf','asdf','asdf','asdf'],
          	['56','第一篇文章，继续加油','总结','哈哈','总结才能进步'],
          	['55','第一篇文章，继续加油','总结','哈哈','总结才能进步'],
          	['1','<p>asdfasdfasas啊岁的发撒地方大赛复赛</p><p>大放送大法师等等dfasfasfdasfdasfsa拉萨的解放看来家f士大夫大师傅大师傅asd</p><p><br/></p><p>asdfdaslfjklasdfjlk;asl;fjkdlasfjkl;s</p><h2>asdflklasdfjlk</h2><h1>asdfjkaslf</h1>','asdfdasf','asfasf','asdfasfdasfsaf'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article_content` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'article_thumbup', $tables))  {
        $this->createTable('{{%article_thumbup}}', [
              'id' => $this->primaryKey(),
              'article_id' => $this->integer(11)->notNull()->unsigned()->comment('文章ID'),
              'user_id' => $this->integer(11)->notNull()->unsigned()->comment('用户ID'),
              'add_time' => $this->integer(11)->notNull()->unsigned()->comment('添加时间'),
        ], $tableOptions);
        $this->batchInsert('{{%article_thumbup}}', ['id','article_id','user_id','add_time'],
        [
          	['10','6','1','1527423344'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."article_thumbup` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'attention', $tables))  {
        $this->createTable('{{%attention}}', [
              'id' => $this->primaryKey(),
              'name' => $this->string(255)->notNull()->comment('名称'),
              'value' => $this->string(255)->notNull()->comment('值'),
              'sign' => $this->string(50)->notNull()->comment('标识'),
              'sort' => $this->integer(11)->notNull()->defaultValue(0)->comment('排序'),
        ], $tableOptions);
        $this->batchInsert('{{%attention}}', ['id','name','value','sign','sort'],
        [
          	['6','article_publish','审核通过才能正式发布','article_create_update','0'],
          	['5','article_publish','文章内容健康，减少网络暴力','article_create_update','0'],
          	['4','article_publish','禁止只发链接，没有实际内容','article_create_update','0'],
          	['3','article_publish','请不要发和本站无关的话题','article_create_update','0'],
          	['2','article_publish','标题必须要有实际意义','article_create_update','0'],
          	['1','article_publish','请输入完整的标题和内容','article_create_update','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."attention` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'contact', $tables))  {
        $this->createTable('{{%contact}}', [
              'id' => $this->primaryKey(),
              'name' => $this->string(50)->notNull()->comment('名称'),
              'email' => $this->string(100)->notNull()->comment('邮箱'),
              'subject' => $this->string(100)->notNull()->comment('主题'),
              'body' => $this->string(255)->notNull()->comment('内容'),
              'ip' => $this->string(128)->comment('IP'),
              'status' => $this->tinyInteger(4)->notNull()->defaultValue(0)->comment('状态.tran:0=未读,1=已读.code:0=Unread,1=Read.'),
              'add_time' => $this->integer(11)->comment(''),
        ], $tableOptions);
        $this->batchInsert('{{%contact}}', ['id','name','email','subject','body','ip','status','add_time'],
        [
          	['4','sasfdasfasf','lbmzorx@163.com','asdfa','asdfasfasdfasfd','127.0.0.1','0','1527388597'],
          	['3','asdfasdf','asdfasf@43asdfas.cp','alkfkjl','klfdjlskaflk;ajf;lkwejk','127.0.0.1','0','1527388542'],
          	['2','asdfasf','asdfasfdsa@2342.com','asdfasdfs','afasdfasfdasfsda','127.0.0.1','0','0'],
          	['1','asdfasf','asdfasfdsa@2342.com','asdfasdfs','afasdfasfdasfsda','127.0.0.1','0','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."contact` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'menu', $tables))  {
        $this->createTable('{{%menu}}', [
              'id' => $this->primaryKey(),
              'position' => $this->tinyInteger(4)->notNull()->defaultValue(0)->comment('位置.tran:0=左,1=上,2=右,3=下.code:0=Left,1=Top,2=Right,3=Botton.'),
              'parent_id' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('父级id'),
              'name' => $this->string(255)->notNull()->comment('名称'),
              'url' => $this->string(255)->notNull()->comment('url地址'),
              'icon' => $this->string(255)->defaultValue('')->comment('图标'),
              'sort' => $this->float()->notNull()->unsigned()->defaultValue(0)->comment('排序'),
              'target' => $this->string(255)->notNull()->defaultValue('_self')->comment('打开方式.tran:_blank=新窗口,_self=本窗口.code:_blank=New Tag,_self=Self Window'),
              'is_absolute_url' => $this->tinyInteger(6)->notNull()->unsigned()->defaultValue(0)->comment('是否绝对地址.tran:0=否,1=是.code:0=No,1=Yes.'),
              'is_display' => $this->tinyInteger(6)->notNull()->unsigned()->defaultValue(1)->comment('是否显示.tran:0=否,1=是.code:0=No,1=Yes.'),
              'recycle' => $this->tinyInteger(3)->notNull()->unsigned()->defaultValue(0)->comment('删除.tran:0=否,1=是.code:0=No,1=Yes.'),
              'add_time' => $this->integer(11)->notNull()->unsigned()->comment('添加时间'),
              'edit_time' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('修改时间'),
        ], $tableOptions);
        $this->batchInsert('{{%menu}}', ['id','position','parent_id','name','url','icon','sort','target','is_absolute_url','is_display','recycle','add_time','edit_time'],
        [
          	['57','1','0','article','site/article','','0','_self','0','1','0','1526787744','0'],
          	['1','0','0','首页','/','fa fa-home','0','_self','0','1','0','1521036199','1526787701'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."menu` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'migration', $tables))  {
        $this->createTable('{{%migration}}', [
              'version' => $this->string(180)->notNull()->comment('版本'),
              'apply_time' => $this->integer(11)->comment('迁移时间'),
              'PRIMARY KEY ([[version]])',
        ], $tableOptions);
        $this->batchInsert('{{%migration}}', ['version','apply_time'],
        [
          	['m000000_000000_base','1525161825'],
          	['m130524_201442_init','1525161837'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."migration` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'options', $tables))  {
        $this->createTable('{{%options}}', [
              'id' => $this->primaryKey(),
              'type' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('类型.tran:0=系统,1=自定义,2=banner,=3广告.code:0=System,1=Self,2=Banner,3=Ad.'),
              'name' => $this->string(255)->notNull()->comment('标识符'),
              'value' => $this->text()->notNull()->comment('值'),
              'input_type' => $this->smallInteger(6)->notNull()->unsigned()->defaultValue(1)->comment('输入框类型.code:0=input,1=texteare,2=img,3=markdown.tran:0=输入框,1=文本框,2=图片,3=Markdown'),
              'autoload' => $this->smallInteger(6)->notNull()->unsigned()->defaultValue(1)->comment('自动加载.tran:0=否,1=是.code:0=No,1=Yes.'),
              'tips' => $this->string(255)->notNull()->defaultValue('')->comment('提示'),
              'sort' => $this->integer(11)->notNull()->unsigned()->defaultValue('0')->comment('排序'),
        ], $tableOptions);
        $this->batchInsert('{{%options}}', ['id','type','name','value','input_type','autoload','tips','sort'],
        [
          	['43','2','尾页','拉萨的空间放大圣诞快乐分','1','1','','0'],
          	['42','1','阿斯短发打岁发生','阿斯短发散发大赛法的撒','1','1','','0'],
          	['41','1','啊岁的发生发所得发','阿斯短发岁的法岁的法','1','1','','0'],
          	['40','1','阿斯短发岁的发送','阿斯短发的沙发上的发','1','1','啊岁的发生发所得发','0'],
          	['25','2','index','首页banner','1','1','首页banner','0'],
          	['24','1','email','admin@feehi.com','1','1','邮箱','0'],
          	['23','1','qq','1838889850阿斯蒂芬撒旦法','1','1','QQ号码','0'],
          	['22','1','wechat','飞得更高','1','1','微信','0'],
          	['21','1','facebook','http://www.facebook.com/liufee','1','1','facebook','0'],
          	['20','1','weibo','http://www.weibo.com/feeppp','1','1','新浪微博','0'],
          	['19','0','smtp_nickname','aslkdjfklsasdfsaasdfasf','1','1','SMTP用户名','0'],
          	['18','0','smtp_encryption','fklsajkd','1','1','连接类型','0'],
          	['17','0','smtp_port','24','1','1','SMTP端口','0'],
          	['16','0','smtp_password','fklsajdfk','1','1','SMTP密码','0'],
          	['15','0','smtp_username','asdlkfk','1','1','SMTP用户名','0'],
          	['14','0','smtp_host','lbmzorx@163.com','1','1','SMTP地址','0'],
          	['13','0','website_url','http://www.sc.net/','1','1','网站地址','0'],
          	['12','0','website_timezone','Asia/Shanghai','1','1','网站时区','0'],
          	['11','0','website_comment_need_verify','1','1','1','状态.tran:0=待审核,1=评论成功,2=审核失败.code:0=Waiting audit,1=Audit Pass,2=Audit Failed.','0'],
          	['10','0','website_comment','1','1','1','网站是否允许评论.0=不允许,1=允许','0'],
          	['9','0','website_status','0','1','1','网站状态.0=关闭,1=开启.','0'],
          	['8','0','website_statics_script','斯卡拉','1','1','统计代码','0'],
          	['7','0','website_icp','黔ICP备18003954','1','1','ICP备案号','0'],
          	['6','0','website_language','zh-CN','1','1','站点语言','0'],
          	['5','0','website_email','lbmzorx@163.com','1','1','联系邮箱','0'],
          	['4','0','website_description','Based on most popular php framework yii2','1','1','网站描述','0'],
          	['3','0','website_title','烟雨重楼','1','1','网站标题','0'],
          	['2','0','seo_description','烟雨重楼，领先的cms管理','1','1','SEO描述','0'],
          	['1','0','seo_keywords','烟雨重楼cms,文章发布,优质用户体验','1','1','seo关键字','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."options` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'tag', $tables))  {
        $this->createTable('{{%tag}}', [
              'id' => $this->primaryKey(),
              'name' => $this->string(100)->notNull()->comment('名称'),
              'frequence' => $this->integer(11)->notNull()->defaultValue(0)->comment('频率'),
        ], $tableOptions);
        $this->batchInsert('{{%tag}}', ['id','name','frequence'],
        [
          	['1','撒旦法','0'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."tag` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'url_check', $tables))  {
        $this->createTable('{{%url_check}}', [
              'id' => $this->primaryKey(),
              'md5' => $this->string(255)->notNull()->comment('校验值'),
              'url' => $this->string(255)->notNull()->comment('链接'),
              'user_id' => $this->integer(11)->notNull()->comment('用户ID'),
              'ip' => $this->string(128)->comment('激活Ip'),
              'num' => $this->integer(11)->defaultValue(0)->comment('次数.'),
              'status' => $this->tinyInteger(4)->notNull()->defaultValue(0)->comment('状态.tran:0=等待,1=已点击,2=失效.code:0=Waiting,1=Clicked,2=Useless.'),
              'auth_key' => $this->string(100)->notNull()->comment('授权码'),
              'expire_time' => $this->integer(11)->defaultValue(0)->comment('失效时间'),
              'add_time' => $this->integer(11)->notNull()->comment('添加时间'),
        ], $tableOptions);
        $this->batchInsert('{{%url_check}}', ['id','md5','url','user_id','ip','num','status','auth_key','expire_time','add_time'],
        [
          	['5','3993a1f7cd46c1b03b4462d578ccd1f6','http://www.sc.net/site/active-account?date=2018-05-26+19%3A16%3A42&expire=1527938202&type=user-signup&sign=3993a1f7cd46c1b03b4462d578ccd1f6','14','','1','1','sFqUi19pNBDEhY0D_HCfnmvqP0_ssB-k','1527938202','1527333402'],
          	['4','0e60d9fbcb097f492b80b44d965839f1','http://www.sc.net/site/active-account?date=2018-05-26+19%3A15%3A09&expire=1527938109&type=user-signup&sign=0e60d9fbcb097f492b80b44d965839f1','13','','1','1','5GDVrpfaDFZylDcbG591ZIxPibZ32-6-','1527938109','1527333309'],
          	['3','58375399e98abef5dc63260548686ab9','http://www.sc.net/site/active-account?date=2018-05-26+18%3A36%3A15&expire=1527935775&type=user-signup&sign=58375399e98abef5dc63260548686ab9','12','','1','1','dvkz4aNwoq_MgLzu5FkOcO5unJhRZIuy','1527935775','1527330975'],
          	['2','49fb25d8aae27162793d584c42c7be99','/site/active-account?date=2018-05-26+16%3A48%3A39&expire=1527929319&type=user-sign&sign=49fb25d8aae27162793d584c42c7be99','11','','0','0','b54qz4_pISQzlOFpZHZiclNmT2K95sBc','1527929319','1527324519'],
          	['1','664b826662933e94767b1e270ae92ea6','/site/active-account?date=2018-05-26+15%3A42%3A29&expire=1527925349&type=user-sign&sign=664b826662933e94767b1e270ae92ea6','9','','0','0','IX7E85HjgIUpssHbemFQeBdWfI9nMRJc','1527925349','1527320549'],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."url_check` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'user', $tables))  {
        $this->createTable('{{%user}}', [
              'id' => $this->primaryKey(),
              'username' => $this->string(255)->notNull()->unique()->comment('用户名'),
              'auth_key' => $this->string(32)->notNull()->unique()->comment('授权码'),
              'secret_key' => $this->string(64)->notNull()->defaultValue('')->unique()->comment('秘密授权码'),
              'password_hash' => $this->string(255)->notNull()->comment('密码'),
              'password_reset_token' => $this->string(255)->unique()->comment('重置密码口令'),
              'email' => $this->string(255)->notNull()->unique()->comment('邮箱'),
              'status' => $this->smallInteger(6)->notNull()->defaultValue(9)->comment('状态.tran:0=删除,1=冻结,2=未通过审核,3=限制登录,4=限制活动,5=登录异常,6=激活失败,9=未激活,10=正常.code:0=Delete,1=Freeze,2=Waiting audit,3=Limit Login,4=Limit Active,5=Login Error,6=Active Error,9=Waiting Active,10=Active.'),
              'created_at' => $this->integer(11)->notNull()->comment('添加时间'),
              'updated_at' => $this->integer(11)->notNull()->comment('修改时间'),
              'head_img' => $this->string(255)->comment(''),
        ], $tableOptions);
        $this->batchInsert('{{%user}}', ['id','username','auth_key','secret_key','password_hash','password_reset_token','email','status','created_at','updated_at','head_img'],
        [
          	['14','asdfadsfasd','sFqUi19pNBDEhY0D_HCfnmvqP0_ssB-k','sFqUi19pNBDEhY0D_HCfnmvqP0_ssB-k','$2y$13$RL9YICzmxZv1J4gsCYeGP.hctK0iykFntGQfD6F4b60M4YqbU3fX2','','1521875638@qq.com','10','1527333402','1527333426',''],
          	['13','roxlk','5GDVrpfaDFZylDcbG591ZIxPibZ32-6-','5GDVrpfaDFZylDcbG591ZIxPibZ32-6-','$2y$13$XN2dT8JzuJgGhYmE4m7xAuBCIMNvybTAIOp68zjJsfxkTMQ4iprui','','1521875s638@qq.com','9','1527333309','1527333322',''],
          	['12','orxtt','dvkz4aNwoq_MgLzu5FkOcO5unJhRZIuy','dvkz4aNwoq_MgLzu5FkOcO5unJhRZIuy','$2y$13$xZVBB4GCcrVUWBG0XcAtSuP0sC33E5a3OCdJHzkpchBfvm2W2ykUi','','15218756b38@qq.com','10','1527330975','1527333182',''],
          	['11','sfsadf','b54qz4_pISQzlOFpZHZiclNmT2K95sBc','b54qz4_pISQzlOFpZHZiclNmT2K95sBc','$2y$13$TRWnXrhtnzyK7U9NqUcMsuO6f40P4IYdOzji2Nd9dmiE.pr09WtqW','','15218756s38@qq.com','9','1527324519','1527324519',''],
          	['1','orx','RWoSmbxUnGGqis-xpTOuauzTTfSPYyuB','RWoSmbxUnGGqis-xpTOuauzTTfSPYyuB','$2y$13$69PkunNk5.Haz0EQHvN/KekhbytcsJm.PphUiFFS59AqpS70mz2YW','','lbmzorx@163.com','10','1527253890','1527253890',''],
        ]);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."user` already exists!\n";
        }
        if (!in_array(Yii::$app->db->tablePrefix.'user_remain', $tables))  {
        $this->createTable('{{%user_remain}}', [
              'id' => $this->bigPrimaryKey(),
              'to_user_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('接收用户ID'),
              'from_user_id' => $this->integer(11)->notNull()->defaultValue(0)->comment('来源用户ID'),
              'content' => $this->string(255)->comment('内容'),
              'remain_type' => $this->tinyInteger(4)->comment('提醒类型.tran:0=评论,1=回答,2=回复,3=评价,4=收藏,5=点赞,6=访客,7=粉丝.code:0=Commit,1=Answer,2=Reply,4=Collection,5=Thumb Up,6=Visitor,7=Fans.'),
              'link' => $this->string(200)->comment('链接'),
              'title' => $this->string(50)->comment('标题'),
              'add_time' => $this->integer(11)->comment(''),
        ], $tableOptions);
        } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."user_remain` already exists!\n";
        }
        
    }

    public function down()
    {
        $this->dropTable('{{%user_remain}}');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%url_check}}');
        $this->dropTable('{{%tag}}');
        $this->dropTable('{{%options}}');
        $this->dropTable('{{%migration}}');
        $this->dropTable('{{%menu}}');
        $this->dropTable('{{%contact}}');
        $this->dropTable('{{%attention}}');
        $this->dropTable('{{%article_thumbup}}');
        $this->dropTable('{{%article_content}}');
        $this->dropTable('{{%article_commit}}');
        $this->dropTable('{{%article_collection}}');
        $this->dropTable('{{%article_cate}}');
        $this->dropTable('{{%article}}');
    }
}
