# CLAUDE.md — ノーレート麻雀ナビ 開発ルール

このファイルはClaudeが一貫した実装を行うための開発ルール定義です。
実装前に必ず読み、このルールに従って作業してください。

---

## プロジェクト概要

| 項目 | 内容 |
|------|------|
| サイト名 | ノーレート麻雀ナビ |
| フレームワーク | CakePHP 2.10.15 |
| PHP | 7.4 |
| DB | MySQL 5.7（テーブル名: `m_stores`） |
| 開発環境 | Docker（localhost:8080） |
| 本番環境 | Lolipop レンタルサーバー |
| CSS | `webroot/css/style.css`（末尾追記方式） |

---

## 開発の基本方針

### 調査→確認→実装の順を守る
1. 対象ファイルを必ず Read で確認してから変更する
2. セレクタや変数名は実際のコードから確認する（推測で書かない）
3. 複数ファイルに影響する変更は事前に影響範囲を列挙する

### 最小変更の原則
- 既存コードは極力壊さない
- 要件を満たす最小の変更だけを行う
- リファクタリング・整理は指示がない限りしない
- 関係のないファイルに触れない

### CSSは末尾追記
- `style.css` の既存CSSは**絶対に変更しない**
- 新しいスタイルは末尾に `Phase番号` ブロックとして追記する
- 既存セレクタを上書きする場合は詳細度または `!important` で対応する

```css
/* ================================================================
   renewal PhaseNN 説明
   ================================================================ */

/* スタイル */

/* ================================================================
   renewal PhaseNN 説明 end
   ================================================================ */
```

---

## CakePHP2 ルール

### データ取得は UtilityComponent 経由
```php
// 正しい使い方
$store_list = $this->Utility->getStores($cond, $order, $limit);

// orderはSQL文字列で指定する（配列でなく文字列を推奨）
$order = 'Stores.visit_date DESC, Stores.id DESC';
```

### 並び順の標準
**すべての店舗一覧は `Stores.visit_date DESC, Stores.id DESC` を使用する。**
訪問日が最も重要な信頼指標であるため、訪問日の新しい順が基本。

### フォーム送信
- `Security` コンポーネントの `validatePost` と `csrfCheck` は **無効化済み**
- 新たにCSRFを有効化する変更は行わない

### 検索フォームのfield名
- トップページ・検索ページ共通：`keyword`（`data[Searchs][keyword]`）
- 都道府県絞り込み：`pref_id`（`data[Searchs][pref_id]`）

### View側でのデータ参照
```php
// 店舗データの参照方法
$row['Stores']['store_name']
$row['Stores']['visit_date']
$row['Stores']['visit_flg']
// など
```

---

## UIルール

### レイアウト構造
- コンテンツはカードベースUI
- スマートフォンファースト（480px以下をSP対応の基準）
- サイドバーは廃止済み（`#sub`, `#side` は `display: none`）

### ボタン設計
| 種別 | 使用場面 | スタイル |
|------|---------|---------|
| 主ボタン | 検索ボタン等 | 塗りつぶし緑（`var(--rn-green)`） |
| 補助ボタン | エリアリンク・戻るボタン | アウトライン（白背景 + 緑枠 + 緑文字） |

補助ボタンの共通CSS：
```css
background: #fff !important;
color: var(--rn-green) !important;
border: 1px solid var(--rn-green) !important;
box-shadow: none !important;
```

### カラー変数（Phase9で上書き済みの値を使う）
```css
--rn-green:      #2e7d32;
--rn-green-dark: #1b5e20;
--primary:       #2e7d32;
```

### hover
- テキストリンク：`opacity: 0.9`
- カード・補助ボタン：`opacity: 1`（transformやbackgroundで表現）
- 重要：`opacity` を使うhover除外クラスが Phase10 に列挙されている

---

## データルール

### 訪問日（最重要）
- `visit_date`（date型）が管理人の訪問証拠
- **表示条件**：`visit_flg = 1` かつ `visit_date` が空でない
- **並び順**：常に訪問日の新しい順（`visit_date DESC`）

### 表示制御
- `status = 1`：表示対象
- `deleted = 0`：SoftDeletable が自動適用（`AppModel` で設定済み）
- `close_flg = 1`：閉店バッジを表示するが一覧には残す

### noimage対応
- サーバーサイド：`store_mime_1` が空かどうかで判定
- 画像なし時：`--noimage` Modifier クラスを付与
- CSS：`.クラス::after { content: 'No Image'; }` で表示

---

## SEOルール

### titleの設定方法
```php
// Controllerで明示的にセット（推奨）
$this->set('page_title', '〇〇の健康麻雀・ノーレート雀荘一覧｜ノーレート麻雀ナビ');

// page_title がないページは sub_title からフォールバック
$this->set('sub_title', '〇〇');
```

### meta description
```php
// Controllerまたはviewでセット
$this->set('meta_description', '説明文');
// セットしない場合はsub_titleベースのテンプレートが自動適用
```

### noindex
```php
$this->set('noindex', true);
```

### 構造化データ（店舗詳細ページのみ）
- `View/Stores/detail.ctp` で LocalBusiness JSON-LD を出力済み
- 新規ページを作る際は必要に応じて追加する

---

## CSSルール

### 詳細度の考え方
- `#main .rn-section-title` = (1,1,0) = 110
- `.top-page .rn-section-title` = (0,2,0) = 020 → **負ける**
- `body.top-page #main .rn-section-title` = (1,2,1) = 121 → **勝つ**
- 負けそうな場合は `!important` を付けるか、ID/class を組み合わせて詳細度を上げる

### よく使う既存クラス
| クラス | 用途 |
|--------|------|
| `.rn-section-title` | セクション見出しh2 |
| `.store-card` | 店舗カード |
| `.store-card__visit-date` | 訪問日ピルラベル |
| `.rn-detail__area-btn` | 詳細ページエリアリンクボタン |
| `.rn-mati-back-btn` | 市区町村→都道府県戻るボタン |
| `.rn-results__back-btn` | 各ページ→トップ戻るボタン |
| `.icon.color7` | NEWバッジ（赤系） |

---

## デプロイルール

### 本番反映時の手順
1. 変更したファイルをFTPで本番サーバーに上書きアップロード
2. アップロード後に `app/tmp/cache/models/` と `app/tmp/cache/persistent/` の中身を削除
3. シークレットウィンドウで動作確認

### 絶対に上書きしてはいけないファイル
- `app/Config/database.php`（本番DB接続情報が入っている）
- `app/tmp/`ディレクトリ（ローカルキャッシュを本番に混入させない）

### デプロイ対象の判断
- View変更 → 対象Viewファイルのみ
- Controller変更 → 対象Controllerファイルのみ
- CSS変更 → `webroot/css/style.css`
- ディレクトリ単位でアップロードする場合は `tmp/` を含めないよう注意

---

## 禁止事項

- DBスキーマ変更（指示がない限り）
- `app/Config/database.php` の変更
- 全ファイル一括上書きデプロイ
- 既存CSSブロックの直接編集
- SecurityコンポーネントのcsrfCheck/validatePost を有効化する変更
- shuffle() を店舗一覧に追加すること（訪問日ソートを崩す）
- 指示なしのリファクタリング・ファイル整理

---

## 詳細ドキュメント

より詳細な実装内容・移植手順は以下を参照：

```
docs/kenko-renewal-summary.md
```
