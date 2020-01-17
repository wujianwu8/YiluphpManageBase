# YiluphpManageBase
这是一份管理后台统一界面的基础代码：为实现所有系统的管理后台在同一个界面上操作，即UI一致，仅通过自定义菜单实现跳转到不同的系统链接。所有子系统的管理后台使用 YiluPHP Manage Base 就起到了这个作用。

YiluPHP Manage Base 中已经实现了：

1、与用户中心统一登录的对接；

2、管理后台UI显示；

3、从用户中心获取管理后台的菜单并展示。

新建一个子系统后的操作步骤：

1、本系统依赖于YiluphpUC的用户和权限管理，所以先下载安装 YiluphpUC；

2、下载安装 YiluphpManageBase。