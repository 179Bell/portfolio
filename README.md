## キャンツー!!
バイクキャンパーのためのキャンプ情報とキャンプギア（キャンプ道具）情報共有アプリです。
<br>

**URL** : https://shingo-portfolio-app.herokuapp.com/


## 制作背景
<br>

私はキャンプツーリングが趣味なのですが、昨今のキャンプブームでキャンプを対象にした様々なサービスがあるなかでキャンプツーリングはどちらかといえばマイナーで対象にしたサービスもありませんでした。
しかしオートキャンプをするキャンパーとキャンプツーリングをするキャンパーでは抱える悩みがかなり変わってきます。
例を上げるとすると

 * キャンプツーリングではギアの選択肢や大きさに制限がある。（積載の問題）
 * キャンプ場によってはアクセスするために急激な坂を登る必要がある。（バイクにとって急な坂はかなりの恐怖）
 * キャンプ場までの道が砂利道やぬかるんだ道が多い（転倒のリスク。荷物を積んでいるのでさらに危険）

などこのような背景からキャンプツーリングで抱える悩みは一般のキャンパー向けサービスでは解決しませんでした。
そこでこのような悩みを解決できるようなアプリを作成してみたいと思い開発を始めました。
<br>

## 使用画面のイメージ
<br>
画像貼る
<br>

## 使用技術
<br>

* フロントエンド
    * HTML
    * CSS
    * MDBootstrap
* バックエンド
    * PHP
    * Laravel
    * PHPUnit
* インフラ
    * Dokcer/Docker-compose(開発環境)
    * AWS S3 
* デプロイ
    * Heroku
* その他
    * VSCode
    * Drawio（ER図）
    * Git/GitHub
<br>

## 機能一覧
<br>

**ユーザー関係**

|  | 機能 |
|:-:|:-:|
| 1 | ユーザー登録・削除機能  |
| 2 | ログイン・ログアウト機能  |
| 3 | ゲストログイン機能  |
| 4 | ユーザー情報編集機能  |
<br>

**キャンプ関係**

|  | 機能 |
|:-:|:-:|
| 1 | 投稿機能（CRUD）  |
| 2 | コメント機能|
| 3 | 検索機能|
| 4 | お気に入り機能|
| 5 | 投稿一覧 |
|6|お気に入り一覧|
|7|画像投稿機能|
<br>

**ギア関係**

| | 機能 |
|:-:|:-:|
| １ | ギア登録機能  |
| 2 | ギア削除機能 |
|3|ギア画像投稿機能| 
<br>

## DB設計
<br>

### ER図
<br>

### 各テーブルについて
<br>

| テーブル名 | 定義 |
|:-:|:-:|
|  users | ユーザーの登録情報  |
|  camps |  キャンプ情報 |
|  camp_imgs |  キャンプ画像 |
|  comments |  コメント |
|bookmarks|お気に入り|
|  gears |  ギア情報 |
|gear_imgs|ギアの画像|
<br>

## 今後追加実装したい機能
<br>

* GoogleMapAPIを用いてキャンプ場の位置情報を取得
* Ajaxを用いたいいね機能
* Amazonや楽天のAPIを導入してギア登録機能と結びつけたい
* AWSへのデプロイ
* 愛車紹介機能
* タグ機能
<br>