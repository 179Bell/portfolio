## キャンツー!!
バイクキャンパーのためのキャンプ情報とキャンプギア（キャンプ道具）情報共有アプリです。
<br>

**URL** : https://shingo-portfolio-app.herokuapp.com/
<br>
![画面収録 2021-10-03 14 40 06](https://user-images.githubusercontent.com/79452631/135741626-351ad468-90e5-4ef9-a1bf-8dbee653518a.gif)

<br>

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

### 記事一覧画面
 * アバター画像をクリックすることでドロップダウンリストが表示されます。
 * ドロップダウンリストからはマイページ、ログアウト、登録情報の変更ができます。
 * ゲストユーザーについては登録情報の編集はできません。

<img src="https://user-images.githubusercontent.com/79452631/135706665-6acaa46a-fe51-4290-9db0-cc385ea5e37f.png" width="600" >

<img src="https://user-images.githubusercontent.com/79452631/135706694-89f12b07-901b-479d-be19-741c5fd89380.png" height="500">
<br>

### 記事投稿機能
 * ヘッダーの投稿ボタンから投稿画面へ遷移できます。
 * 投稿のカードをクリックすることで詳細画面へ遷移できます。
 * 詳細画面からコメントを投稿できます。
 * 自分の投稿以外の投稿にお気に入りボタンが表示されてお気に入りに登録できます。
 ![画面収録 2021-10-03 14 48 44](https://user-images.githubusercontent.com/79452631/135741850-4d86f586-2813-4cae-9351-d71d25acaf74.gif)



### 記事編集機能

 * ドロップダウンリストから投稿の編集をすることが可能です。
 ![画面収録 2021-10-03 14 48 44](https://user-images.githubusercontent.com/79452631/135741850-4d86f586-2813-4cae-9351-d71d25acaf74.gif)
<br>

### 記事削除機能
 * ドロップダウンリストから削除することが可能です
 * 削除機能はモーダルを用いることで安易に消せない仕様にしました。

![削除](https://user-images.githubusercontent.com/79452631/135706533-439cd4ca-5823-459d-b3a0-46168c0361f4.gif)

<br>

### マイページ
<br>

 * ヘッダーのアバター画像をクリックすることでマイページに遷移できます。
 * ギア、キャンプ、お気に入りの各タブを表示しています。
 * 自分自身のユーザページであればギアとキャンプを削除することができます。
![マイページ](https://user-images.githubusercontent.com/79452631/135742182-9895eff0-633b-484d-921f-7884c4ffed5f.gif)


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

## インフラ図

![名称未設定](https://user-images.githubusercontent.com/79452631/135708514-62948a4c-0750-40bf-98c3-6f436205e7b6.png)


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
![PFER図 (1)](https://user-images.githubusercontent.com/79452631/135704254-a826f202-e0be-46c3-a23c-aef1ac251591.png)


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