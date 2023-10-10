# RestaurantChainMockup_RecursionCS

# 概要

RecursionCS バックエンドプロジェクトの課題です

モックアップページのランダム生成を目的としています

練習用としての側面が強いです

# 動作確認

以下のURLにアクセスしてみて下さい

https://restaurant-chain-mockup.onrender.com

※重いのでアクセスに時間かかります。

## 見本

![見本](app/doc/img/image.png)

---

# ローカル環境での試し方 

## phpのインストール

phpをインストールしてください

一例としてmacとUbuntuを載せておきます

### mac

```shell
brew update
brew install php
```

### Linux

### Ubuntu/Debian系

```shell
sudo apt update
sudo apt install php php-cli php-fpm php-json php-common php-mysql php-zip php-gd php-mbstring php-curl php-xml php-pear
```

## ビルトインサーバをたてる

./appディレクトリ内で、phpのビルトインサーバをたてて下さい

ポート番号は環境に合わせて任意のものを入力して下さい

例: 8000, 8080, etc...

```shell
cd app
php -S localhost:<port番号>
```

## ブラウザでアクセス

ブラウザを開き、以下のURLを入力してアクセス

```plane
http://localhost:<port番号>

# あるいは
localhost:<port番号>
```

## ページの更新

ページを更新し、ランダムにダミーのレストランチェーンが生成されるのを確認して下さい

---

# ポイントなど

- 個人的な挑戦として、テストコードを書いています
- 拙いところ等あれば指摘もらえると嬉しいです
- dockerファイル化しデプロイしてみました
