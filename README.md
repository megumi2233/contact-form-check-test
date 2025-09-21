# contact-form-check-test

## 概要　
このリポジトリは、確認テスト第1回の課題として作成したお問い合わせフォームです。  
LaravelとDockerを使用して、ローカル環境で動作するフォーム機能を構築しています。

---

## 🛠️ 環境構築手順

### 1. リポジトリの設定
このプロジェクトのベースとなるコードを取得するために、GitHubからリポジトリをクローンします。

### 2. Docker の設定
ローカル環境に必要なサービス（PHP, MySQLなど）をDockerで構築・起動します。

以下のコマンドでDocker環境を構築・起動しました：
```bash
docker-compose up -d --build
```

### 3. Laravel のパッケージのインストール
Laravelの動作に必要な依存パッケージをインストールします。
```bash
docker-compose exec app bash
composer install
```

### 4. .env ファイルの作成
Laravelの環境設定を行うために、.envファイルを作成し、アプリケーションキーを生成します。
```bash
cp .env.example .env
php artisan key:generate
```

### 5.view ファイルの作成
ユーザーが入力するお問い合わせフォームの画面を作成します。

resources/views/contact.blade.php にフォーム画面を実装しました。

### 6.CSS ファイルの作成
フォーム画面のデザインを整えるためのスタイルを記述します。

public/css/style.css にスタイルを記述しました。

## 🛠 使用技術（この例で使われている環境）
- PHP 8.0
- Laravel 10.0
- MySQL 8.0

## 🗂 ER図（このプロジェクトのデータ構造）
このアプリケーションのデータ構造を視覚的に把握するため、以下にER図を掲載しています。

この図では、`contacts` テーブルが `categories` テーブルに属する「1対多」の関係を示しています。  
各テーブルは右形式（表形式）で構成されており、主キー（PK）・外部キー（FK）の役割が明示されています。  
また、`gender` カラムの値（1: 男性、2: 女性、3: その他）については図内に注釈を記載しています。

![ER図](assets/er_diagram.png)

※ 補足：
- 図は draw.io にて作成し、PNG形式で保存しています。
- 元データは `src/contact-form-er.drawio` にて編集可能です。
- 編集には [draw.io（diagrams.net）](https://app.diagrams.net/) を使用してください。  
　ローカルアプリまたはブラウザ版のどちらでも編集可能です。

## 🌐 ローカル環境での確認用URL
- アプリケーション: [http://localhost/](http://localhost/)
- phpMyAdmin: [http://localhost:8080/](http://localhost:8080/)

## 動作確認

## ライセンス
