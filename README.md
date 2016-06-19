# aliyun-oss-explorer
使用PHP编写的阿里云OSS的管理工具，可以不用打开aliyun的网站就可以管理OSS了。

![preview](https://raw.githubusercontent.com/shellus/aliyun-oss-explorer/master/tests/preview.jpg)

## 使用(Usage)
```
git clone git@github.com:shellus/aliyun-oss-explorer.git

cd aliyun-oss-explorer

composer install

bower install

mv .env.example .env

php artisan key:generate

# edit .env change database connections info

php artisan serve

# open http://localhost:8000 in you browser
```