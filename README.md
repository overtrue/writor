## Writor

基于Laravel框架开发的博客系统。

目前处于开发阶段...

###Usage
1. clone或者下载zip包解压到你的服务器环境
1. 切换到composer.json同级目录，执行`composer install`
1. 修改数据库配置`app/config/database.php`
1. 初始管理员的用户名为`admin`,密码为`admin`,你想修改可以在`app/database/seeds/UserTableSeeder.php`中修改初始人员信息再执行安装
1. 安装数据库

    ```
    php artisan migrate #安装数据表结构
    php artisan db:seed #初始化管理员
    ```

1. 如果你的目录为www/writor，那么现在访问`http://yourhost/writor/public/admin` 应该会跳转到后台登录页。

###友情提示
如果你的网络慢，使用composer install老半天没反应，你可以直接拷其它laravel项目的vendor目录放到本目录就好。
然后再执行一下：`composer dumpautoload`，如果运行不起来，试试`composer install`。:smiley:

###Demo
[http://writor.me](http://writor.me)
