# RestaurantChainMockup_RecursionCS

# 概要

RecursionCS バックエンドプロジェクトの課題です

Restaurant chain のモックアップを作成し、各種ダウンロード or HTMLで表示します

# 使い方

## 準備

まず以下のコマンドでサーバーをたてる

```shell
cd app
php -S localhost:3000
```

その後、

http://localhost:3000

にアクセスする

## 使用方法

1. 作成したいmockのパラメータを設定する

2. 生成したいformatを選択する

3. 「Generate」ボタンをクリックして、Let's Generate!

![使用方法イメージ](./doc/image.png)

## 生成ファイルフォーマットについて

HTMLは、画面を生成してそこに遷移します

![HTML生成イメージ](./doc/image2.png)


他のフォーマットは、生成後、ダウンロードが開始されます
- Markdown
- JSON
- TEXT

---

# その他

コードが肥大化して見通しが悪くなってきたので、doxygenを用いてドキュメントを作成してみました

app/doc/index.html

を、ブラウザで開いたら見れます
(サーバーを建てる必要はなし)

「Classes」の「classList」からクラス一覧

![ドキュメントイメージ](/doc/image3.png)

各クラスの説明が記述されています

![ドキュメントイメージ2](/doc/image4.png)

