# アプリケーション名 ：　　 Rese（リーズ） 　概要説明：ある企業のグループ会社の飲食店予約サービス</br>

飲食店予約サービス：予約機能・お気に入り機能・検索機能</br>
　トップ画面</br>

## 作成した目的

人事評価のため</br>
　　 Laravel・php・html・css などの開発言語を使用した</br>
　　アプリケーション作成の学習(模擬案件を通して実践に近い開発経験をつむ)</br>

## アプリケーション URL ローカル環境による開発のため　なし

参照：</br>
　　 DB : http://localhost:8080/ </br>
トップ：http://localhost/" </br>

・注意事項</br>
　　　お気に入り機能：お気に入りボタンの動作に少し時間差があります.オンオフが遅い場合は、キャッシュを消すか、ページ更新をしてみてください</br>
　　　検索機能：飲食店一覧ページのsearch の入力欄にエンターを押すことで作動します </br>
　　　　　　　エリア、ジャンルのみで検索したい場合　入力欄は空白のままエンターを押してください。</br>
　　　予約機能：飲食店一覧ページの各店舗「詳しく見る」ボタンより予約ページに移動します</br>
　　　　　　　お店を予約する際に、ログインしていない場合　「予約する」ボタンを押すとログインページに飛びます</br>
　　　マイページ機能：「予約変更」の文字を入力すると　予約変更画面に移動します。

## 他のリポジトリ

バックエンド：docker </br>
フロントエンド：src </br>

## 機能一覧

・会員登録機能 </br>
・ログイン、ログアウト機能 </br>
・飲食店表示機能 </br>
　　　飲食店一覧：お気に入り追加・削除機能 </br>
　　　飲食店詳細：予約機能 </br>
　　　飲食店検索機能：エリア、ジャンル、店舗名</br>
・マイページ機能</br>
　　　飲食店お気に入り削除　</br>
　　　飲食店予約削除機能 </br>
　　　飲食店予約情報変更</br>

## 使用技術(実行環境)

・Laravel Framework 5.8.38 </br>
・php, javascript, html, css など </br>

## テーブル設計の画像
<img width="419" alt="スクリーンショット 2023-12-25 0 20 08" src="https://github.com/k-ike2525/Rese/assets/137484536/6f4609d9-e055-43f0-a4ec-30d062207f20">


## ER 図
<img width="917" alt="スクリーンショット 2023-12-24 23 39 33" src="https://github.com/k-ike2525/Rese/assets/137484536/5867d7b9-d208-4093-92fd-80acb06dbeb9">

## 環境構築

注：以下　上から順にターミナルより　実行してください　</br>
開発環境を GitHub からクローン　 </br>
$ cd XXX 　 </br>
$ git clone git@github.com:k-ike2525/Rese.git </br>　
$ mv Atte XXX 　 </br>
「XXX」　は任意のディレクトリ名 </br>

docker 構築 </br>
$ docker-compose up -d --build </br>
補足：実行できない場合は、Rese/docker/mysqlのdataディレクトリの中身ファイルををすべて削除して再度実行してください。
$ code . </br>
$ docker-compose exec php bash </br>

laravel パッケージをインストール </br>
$ composer install </br>
$ composer dump-autoload

.env.example ファイルをインストール </br>
$ cp .env.example .env　　　 </br>
$ php artisan key:generate　　 </br>
補足：</br>
実行できない場合は、envファイル作成　docker 構築を繰り返してください

Rese 各テーブル取得　</br>
php artisan migrate </br>

laravel 各データをインストール </br>
$ php artisan storage:link　</br>
補足：</br>
src/public/storage に imgディレクトリ（画像５枚）また、　strage エイリアス ファイルの確認</br>
img ディレクトリ内の画像を読み込みます。

$ php artisan db:seed --class=GenreSeeder</br>
$ php artisan db:seed --class=AreaSeeder</br>
$ php artisan db:seed --class=ShopSeeder</br>

laravel 更新 </br>
$ composer dump-autoload

## 他に記載することがあれば記述する

開発時の.env ファイル　参照 </br>

DB_CONNECTION=mysql 　 </br>
DB_HOST=mysql </br>
DB_PORT=3306 </br>
DB_DATABASE=laravel_db </br>
DB_USERNAME=laravel_user </br>
DB_PASSWORD=laravel_pass </br>
以上 </br># Rese
