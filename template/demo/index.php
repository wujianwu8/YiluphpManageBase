<!--{use_layout layout/main}-->
<?php
$head_info = [
    'title' => '管理后台示例页面',
];
?>

<h2 class="row mb-3">
    <?php echo $app->lang('管理后台基础页面'); ?>
</h2>
<div>当前controller是：controller/demo/index.php</div>
<div>当前模板是：template/demo/index.php</div>
<hr class="hr">

<div class="table-responsive">
    <div>为实现所有系统的管理后台在同一个界面上操作，即UI一致，仅通过自定义菜单实现跳转到不同的系统链接。所有子系统的管理后台使用 YiluPHP Manage Base
        就起到了这个作用。YiluPHP Manage Base 中已经实现了：</div>
    <ol>
        <li>
            与用户中心统一登录的对接；
        </li>
        <li>
            管理后台UI显示；
        </li>
        <li>
            从用户中心获取管理后台的菜单并展示；
        </li>
    </ol>
    <hr class="hr">
    <div>新建一个子系统后的操作步骤：</div>
    <ol>
        <li>
            本系统依赖于YiluphpUC的用户和权限管理，所以先下载安装
            <a href="https://www.yiluphp.com/docs/YiluphpUC_1_0/30" target="_blank">YiluphpUC</a>
        </li>
        <li>
            下载安装
            <a href="https://www.yiluphp.com/docs/YiluphpUC_1_0/30" target="_blank">YiluphpManageBase</a>
        </li>
    </ol>
</div>
