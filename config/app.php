<?php
/*
 * 用户的配置文件
 * YiluPHP vision 2.0
 * User: Jim.Wu
 * * Date: 2021/01/23
 * Time: 09:22
 */

$origin = isset($_SERVER['HTTP_ORIGIN'])?$_SERVER['HTTP_ORIGIN']:'';
$allow_origin = ['http://39.108.248.197','http://www.yiluphp.com','https://www.yiluphp.com'];
if (in_array($origin, $allow_origin)) {
    //制定允许其他域名访问 header("Access-Control-Allow-Origin://www.yiluphp.com");
    header('Access-Control-Allow-Origin:'.$origin);
    //允许请求方式 header("Access-Control-Allow-Methods: POST,GET,PUT,OPTIONS,DELETE");
    header('Access-Control-Allow-Methods:*');
    //请求头
    header('Access-Control-Allow-Headers:*');
    // 响应头设置
    header('Access-Control-Allow-Credentials:true'); //是否可以携带cookie
}

date_default_timezone_set('Asia/Shanghai');

define('REDIS_LOGIN_USER_INFO', 'REDIS_LOGIN_USER_INFO_');   //登录用户的信息,长期存redis时用,后面接cookie vk 的值，与用户中心的不是同一个
define('REDIS_LAST_LOGIN_UID', 'REDIS_LAST_LOGIN_UID_');   //最后一个登录用户的UID，缓存1天

define('REDIS_KEY_MOBILE_VERIFY_CODE', 'REDIS_KEY_MOBILE_VERIFY_CODE_'); //手机验证码的缓存键前缀，后面加“手机号码和session id拼接后的MD5值”
define('REDIS_KEY_EMAIL_VERIFY_CODE', 'REDIS_KEY_EMAIL_VERIFY_CODE_'); //邮箱验证码的缓存键前缀，后面加“邮箱和session id拼接后的MD5值”
define('REDIS_KEY_SEND_VERIFY_CODE_ON_MOBILE', 'REDIS_KEY_SEND_VERIFY_CODE_ON_MOBILE_'); //手机号发送验证码之后，缓存记录标识30秒
define('REDIS_KEY_SEND_VERIFY_CODE_ON_EMAIL', 'REDIS_KEY_SEND_VERIFY_CODE_ON_EMAIL_'); //邮箱发送验证码之后，缓存记录标识30秒
define('REDIS_KEY_SEND_VERIFY_CODE_ON_CLIENT', 'REDIS_KEY_SEND_VERIFY_CODE_ON_CLIENT_'); //客户端发送验证码之后，缓存记录标识30秒
define('REDIS_KEY_PHONE_SMS_IN_TEN_MIN', 'REDIS_KEY_PHONE_SMS_IN_TEN_MIN_'); //HASH存储10分钟内给某个手机号发送验证码的短信平台
define('REDIS_KEY_WEIXIN_QR_LOGIN_CODE', 'REDIS_KEY_WEIXIN_QR_LOGIN_CODE_'); //微信二维码登录时，存储用户的session id，用于登录后对应客户端用户
define('REDIS_KEY_ALL_NICKNAME', 'REDIS_KEY_ALL_NICKNAME'); //HASH存储所有已经使用和被查询为可用的昵称
define('REDIS_KEY_NEW_NICKNAME', 'REDIS_KEY_NEW_NICKNAME'); //HASH存储所有被查询为可用的\但未被定时任务验证的昵称
define('REDIS_KEY_ALL_MENUS', 'REDIS_KEY_ALL_MENUS'); //缓存所有的菜单
/*
 * HASH存储所有已经注册的登录身份及其ID
 * 如果分表则分10个REDIS库存储
*/
define('REDIS_KEY_ALL_IDENTITY', 'REDIS_KEY_ALL_IDENTITY');
define('REDIS_KEY_MOBILE_UID', 'REDIS_KEY_MOBILE_UID');

define('REDIS_KEY_LOGIN_USER_INFO_BY_VK', 'REDIS_KEY_LOGIN_USER_INFO_BY_VK_');   //登录用户的信息,后面接cookie vk 的值
define('REDIS_KEY_LOGIN_USER_INFO_BY_UID', 'REDIS_KEY_LOGIN_USER_INFO_BY_UID_');   //登录用户的信息,后面接UID
define('REDIS_KEY_USER_LOGIN_TLT', 'REDIS_KEY_USER_LOGIN_TLT_');   //临时登录令牌的信息,后面接TLT
define('REDIS_KEY_SEARCH_USER_RESULT', 'REDIS_KEY_SEARCH_USER_RESULT_');    //缓存搜索到的全部用户ID
define('REDIS_KEY_QQ_CALLBACK', 'REDIS_KEY_QQ_CALLBACK_');  //QQ授权登录时，记录是否已经关闭小窗口
define('REDIS_KEY_USER_PERMISSION', 'REDIS_KEY_USER_PERMISSION_');  //缓存用户拥有的所有权限，存储app_id:permission_key格式的

define('TIME_10_YEAR', 315360000); //10年的秒数
define('TIME_5_YEAR', 157680000); //5年的秒数
define('TIME_2_YEAR', 63072000); //2年的秒数
define('TIME_1_YEAR', 31536000); //1年的秒数
define('TIME_60_DAY', 5184000); //60天的秒数
define('TIME_30_DAY', 2592000); //30天的秒数
define('TIME_DAY', 86400); //24小时的秒数
define('TIME_30_MIN', 1800); //30分钟的秒数
define('TIME_10_MIN', 600); //10分钟的秒数
define('TIME_MIN', 60); //1分钟的秒数
define('TIME_30_SEC', 30); //30秒

define('CODE_ATTACKED_BY_CSRF', 30001); //可能遭受CSRF攻击
define('CODE_NOT_CONFIG_SMS_PLAT', 30002);	//未配置短信发送所需要信息
define('CODE_EMAIL_PLAT_CONFIG_ERROR', 30003);	//配置邮件发送平台的信息错误
define('CODE_INVALID', 601); //失效
define('CODE_FAIL_TO_GENERATE_UID', 602); //生成用户ID失败
define('CODE_USER_NOT_LOGIN', -1);	//用户未登录的错误码

/*
 * 全局配置文件
 */
$config = [
    /*
     * 在这里设置需要重写的路由
     */
    'rewrite_route' => [
        '/menus/edit/{id}' => '/menus/edit/id/{id}',
    ],

    /**
     * 是否支持多语言切换
     **/
    'multi_Lang' => false,

    /**
     * 默认语言设置，如果你的系统使用多语言，在这里可以设置默认的语言
     **/
    'lang' => 'cn',

    //用户默认头像
    'default_avatar' => '/img/default_avatar.gif',

    //是否开放注册
    'open_sign_up' => false,

    /**
     * 是否对数据表进行分表分库,true为分表分库,false为不分表分库,默认为false
     * 如果需要分表分库,需要先配置所有分库的Mysql连接,然后确保停止了增加和修改数据,再手工导数据到各分表
     * 分表方式按表中某整数类型的字段的后两位数进行拆分,拆分成100个分表
     * 分表的库连接名称也是在默认的库连接名称(default)后面加下划线加分表的数字后缀,如default_1, default_23
     **/
    'split_table' => false,

    /**
     * 默认的controller名称
     **/
    'default_controller' => 'index/index',

    /**
     * 在这里设置前置helper类，这些类会在执行controller之前执行
     * before_controller的数组中里面可以配置多个helper的类名
     * 用于before_controller类从构造函数__construct()开始执行
     **/
    'before_controller' => ['hook_route_auth'],

    /**
     * 在这里设置后置helper类，这些类会在执行完controller之后执行
     * after_controller的数组中里面可以配置多个helper的类名
     * 用于after_controller类从构造函数__construct()开始执行
     **/
    'after_controller' => [],

    /*
     * 是否使用session，true为使用，false为不使用
     * YiluPHP的session是使用redis存储的，可以实现集群服务器之间共享session
     * */
    'use_session' => true,
];

/*
 * 针对不同环境设置不一样的配置配置信息,建议单独一个文件存放
 */
return array_merge($config, require('/data/config/admin.yiluphp.com/config.php'));