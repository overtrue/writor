## writor

基于Laravel框架开发的博客系统。

> 只完成了后台管理部分，前台请根据需求自行开发。


###Usage
---
1. clone writor到你的服务器环境

	```
	cd www #你的服务器放网站的目录
	git clone https://github.com/overtrue/writor.git
	```

1. 切换到`composer.json`所在目录，使用composer安装项目

	> 如果没有安装过composer请先安装：<br>
 	linux/OSX: [https://getcomposer.org/doc/00-intro.md#installation-nix](https://getcomposer.org/doc/00-intro.md#installation-nix)<br>
 	windows: [https://getcomposer.org/doc/00-intro.md#installation-windows](https://getcomposer.org/doc/00-intro.md#installation-windows)

	```
	cd www/writor
	composer install
	```

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

1. 开启重写模块:使用`apache`请开启`mod_rewrite`,使用`nginx`同学请参考这个配置示例：[https://gist.github.com/davzie/3938080](https://gist.github.com/davzie/3938080)

1. 那么现在访问`http://yourhost/writor/public/admin` 应该会跳转到后台登录页。

###友情提示
---
- 因为本项目还在持续开发中，如果你想跟进开发进度请点击右上角的`watch`以便于收到更新邮件通知。
- 如果你的网络慢，使用composer install老半天没反应，你可以直接拷其它laravel项目的vendor目录放到本目录就好。
然后再执行一下：`composer dumpautoload`，如果运行不起来，试试`composer install`。:smiley:

> 当然别忘记点上面的 star 哦! :stuck_out_tongue_winking_eye:

####感谢支持！
