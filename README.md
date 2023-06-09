# Laravel インストール方法
1. `docker compose build --no-cache` (ビルドする)
2. `docker compose up -d` (コンテナをたてる)
3. `docker compose exec app sh` (appコンテナに入る)
4. `composer create-project --prefer-dist laravel/laravel . "10.*"` (src配下にLaravel10をインストール)
5. ブラウザで `http://localhost` にアクセスし、Laravelのロゴ入りのトップページが表示されることを確認

# データベースの作成
1. appコンテナに入っていることを確認
    - (入っていなければ、`docker compose exec app sh`)
2. `src > .env` の内容を以下のように書き換える
    ```
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=website
    DB_USERNAME=posse
    DB_PASSWORD=password
    ```
3. `php artisan migrate` をして、以下のように出力されれあば成功
    ```
    2014_10_12_000000_create_users_table ........................................ 274ms DONE
    2014_10_12_100000_create_password_reset_tokens_table ........................ 196ms DONE
    2019_08_19_000000_create_failed_jobs_table .................................. 116ms DONE
    2019_12_14_000001_create_personal_access_tokens_table ....................... 196ms DONE
    ```

# Breeze インストール方法
1. appコンテナに入っていることを確認
    - (入っていなければ、`docker compose exec app sh`)
2. `composer require laravel/breeze --dev`
3. `php artisan breeze:install` を入力し、選択肢は以下の通り
    - `Which stack would you like to install?` : 0 (blade)
    - `Would you like to install dark mode support?` : no
    - `Would you prefer Pest tests instead of PHPUnit?` : no
4. トップページの右上に `Log in` `Register` が表示されていることを確認
