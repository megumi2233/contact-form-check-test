# contact-form-check-test

## 概要　
このリポジトリは、確認テスト第1回の課題として作成したお問い合わせフォームです。  
LaravelとDockerを使用して、ローカル環境で動作するフォーム機能を構築しています。

---

## 🛠️ 環境構築手順

### 1. リポジトリの設定
GitHubでリポジトリを作成し、テンプレートをクローンしてディレクトリ名を変更しました。

### 2. Docker の設定
以下のコマンドでDocker環境を構築しました：
```bash
docker-compose up -d --build
```

### 3. Laravel のパッケージのインストール
```bash
docker-compose exec app bash
composer install
```

### 4. .env ファイルの作成
.env ファイルを作成し、アプリケーションキーを生成することでLaravelが起動可能になります。
```bash
cp .env.example .env
php artisan key:generate
```

### 5.view ファイルの作成
resources/views/contact.blade.php にフォーム画面を実装しました。

### 6.CSS ファイルの作成
public/css/style.css にスタイルを記述しました。

## 使用技術

## 動作確認

## アクセスURL

## ライセンス
