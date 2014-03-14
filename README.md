## Writor

基于Laravel框架开发的博客系统。[http://writor.me](http://writor.me)

>目前处于开发阶段...

###Usage
---
1. clone或者下载zip包解压到你的服务器环境
1. 切换到`composer.json`所在目录，执行`composer install`
1. 修改`bootstrap/start.php`中`27`行的环境配置，里面有说明。 
1. 修改数据库配置`app/config/database.php`，如果你没改上面的start.php中的环境部分的话请修改`app/config/production/database.php`。
1. 修改`app/storage/` 目录权限为可写,*nix下 执行：
    ```
    sudo chmod -R 755 app/storage/ 
    ```
1. 初始管理员的用户名为`admin`,密码为`admin`,你想修改可以在`app/database/seeds/UserTableSeeder.php`中修改初始人员信息再执行安装
1. 安装数据库

    ```
    php artisan migrate #安装数据表结构
    php artisan db:seed #初始化管理员
    ```

1. 如果你的目录为www/writor，那么现在访问`http://yourhost/writor/public/admin` 应该会跳转到后台登录页。

###友情提示
---
如果你的网络慢，使用composer install老半天没反应，你可以直接拷其它laravel项目的vendor目录放到本目录就好。
然后再执行一下：`composer dumpautoload`，如果运行不起来，试试`composer install`。:smiley:

> 别忘记点上面的 star哦! :stuck_out_tongue_winking_eye:
####感谢支持！


