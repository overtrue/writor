## Writor

基于Laravel框架开发的博客系统。

目前处于开发阶段...

###Usage
1. clone或者下载zip包解压到你的服务器环境
2. 切换到composer.json同级目录，执行`composer install`
3. 修改数据库配置`app/config/database.php`
4. 初始管理员的用户名为`admin`,密码为`123456`,你想修改可以在`app/database/seeds/UserTableSeeder.php`中修改初始人员信息再执行安装
4. 安装数据库
    ```
    php artisan migrate #安装数据表结构
    php artisan db:seed #初始化管理员
    ```

5.如果你的目录为www/writor，那么现在访问`http://yourhost/writor/public/admin` 应该会跳转到后台登录页。


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/joychao/writor/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

