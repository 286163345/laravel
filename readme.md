1.拉取项目后将 env.example复制一份改为 .env文件
2.执行composer install下载vendor文件
3.执行php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"发布资源
4.执行 php artisan admin:install 生成新的表
生成appkey: php artisan key:generate  
用到的命令:
php artisan admin:make UserController --model=App\User  laraveladmin控制器创建
php artisan make:migration create_company_table  创建迁移文件
php artisan migrate   执行迁移
php artisan migrate:rollback  执行回滚迁移(最后一次)
php artisan migrate:reset   执行回滚迁移(所有)
php artisan migrate:refresh  重置数据库并重新运行所有迁移
php artisan migrate:generate  根据数据库已有表生成迁移文件

php artisan make:model Brand -m　　//创建模型并生成迁移文件   不加-m 只会创建模型
php artisan admin:make BrandController --model=App\Brand　　//创建关联Brand模型的控制器
php artisan make:migration add_intro_column_to_articles --table=articles  往已生成的表中添加新字段

php artisan make:form Forms/PostForm  创建表单
composer dump-autoload  加载app/service下的php文件生成全局公共方法
