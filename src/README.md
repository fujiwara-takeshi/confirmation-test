# お問い合わせフォーム

## 環境構築
Dockerビルド
 1. git clone git@github.com:fujiwara-takeshi/confirmation-test.git
 2. docker-compose up -d --build

※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

Laravel環境構築
 1. docker-compose exec php bash
 2. composer install
 3. .env.exampleファイルから.envを作成し、環境変数を変更
 4. php artisan key:generate
 5. php artisan migrate
 6. php artisan db:seed

## 使用技術
 ・PHP 8.3</br>
 ・Laravel 8.83</br>
 ・MySQL 8.0

## ER図
![スクリーンショット 2024-03-03 231821](https://github.com/fujiwara-takeshi/confirmation-test/assets/151005520/523c0e24-88a1-4687-b676-e01834801ee3)



## URL
 ・開発環境：http://localhost/</br>
 ・phpMyAdmin：http://localhost:8080/
 
