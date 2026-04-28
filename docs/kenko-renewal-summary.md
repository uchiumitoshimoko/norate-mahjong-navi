# ノーレート麻雀ナビ リニューアル実装サマリー

> 別プロジェクト（free-mj.com）への移植、および今後の保守・追加開発の基準ドキュメント。
> このドキュメントを読むだけで同等の実装が再現できることを目的とする。

---

## 1. プロジェクト概要

### サイト概要
- **サイト名**：ノーレート麻雀ナビ
- **URL**：https://kenko-norate-mahjong.com/
- **目的**：全国の健康麻雀・ノーレート麻雀店・フリー雀荘の検索サイト

### 対象ユーザー
- 健康麻雀・ノーレート麻雀を探している人
- 近くの雀荘を探したいが賭け麻雀は避けたい人
- 管理人（個人運営、実際に店舗を訪問して情報を集めている）

### サイトの特徴
- **訪問ベース**：管理人が実際に足を運んで確認した店舗のみ掲載（または掲載依頼受付）
- **訪問日が信頼指標**：いつ時点の情報かを明示することがサイト価値に直結する
- **健康麻雀特化**：賭け麻雀なし、競技麻雀・ノーレートフリー・健康麻雀を分類
- **個人運営ブログ連携**：free-mj-blog.com の訪問記事と紐づいている

---

## 2. リニューアル方針

### UI改善
- 旧来のテンプレートベースUIから、カードベースの現代的UIへ移行
- スマートフォン優先のレイアウト設計
- 情報の優先度を整理し、余白を増やして読みやすく

### SEO強化
- ページごとに最適化した `<title>` タグ設定（`page_title` 変数でController制御）
- `meta description` の自動生成（店舗詳細ページはコメントから120文字生成）
- `canonical` URL の明示
- 店舗詳細ページに LocalBusiness 構造化データ（JSON-LD）追加
- フッターに都道府県別内部リンクグリッドを設置

### 信頼性向上
- 店舗カードに訪問日を目立つ信頼ラベルとして表示
- 閉店フラグの視覚的表示（バッジ + カードの透過）

### モバイル最適化
- SP用フローティングボトムナビ（Home / 都道府県 / 新着 / ピックアップ / Map検索）
- 情報カードのSP縦積みレイアウト
- ロゴフォントサイズのSP最適化（17px）

---

## 3. 実装した機能一覧

### 店舗カードUI（`View/Elements/store_card.ctp`）
- 画像 → タグ → 店舗名 → エリア → 駅名 → **訪問日** → コメントの順で表示
- 画像なし時は `.store-card__img--noimage` クラス + CSS `::after { content: 'No Image' }` で対応
- 閉店店舗は `.store-card--closed` クラス + 「閉店」オーバーレイラベル表示
- コメントは `line-clamp: 3` で3行に制限

### 訪問日表示（Phase14）
- `visit_flg = 1` かつ `visit_date` が入っている場合のみ表示
- デザイン：薄緑背景（`rgba(46,125,50,0.1)`）+ 濃緑文字（`#1b5e20`）のピル型ラベル
- 表示クラス：`.store-card__visit-date`
- 表示位置：駅名の下・コメントの上

### noimage対応（Phase6）
- DB の `store_mime_1` カラム（画像有無フラグ）でサーバーサイド判定
- 画像なし時は `.store-card__img--noimage` / `.rn-pref-card__img--noimage` クラスを付与
- CSS `::after { content: 'No Image' }` でテキスト表示（SVGファイル不使用）
- pref_list / matis list / TopPages でも同様の `onerror` JS フォールバックを設置

### フリーワード検索範囲拡張（`Controller/SearchController.php`）
- 旧：`store_name` のみ
- 新：`store_name` / `address` / `mati` / `station` / `comment` / `free_word_text` の6カラムOR検索
- 全角・半角スペースでの複数キーワードAND検索に対応
- トップページ・検索ページ両方からポスト可能（フォームfield名 `keyword`）

### Google Map対応（`View/GoogleMaps/index.ctp`）
- Google My Maps の iframe 埋め込み
- 403対策として `/d/u/0/embed?...&noprof=1` 形式のURLを使用
- iframe が表示されない場合の「別画面で開く」ボタンを必ず併記
- 将来的に Google Maps JavaScript API へ移行する可能性あり（コメントに明記済み）

### フッター再設計（Phase7）
- 背景色：`#1c2b1c`（ダーク緑）
- 都道府県別内部リンクグリッド（`<details open>` で常時展開）
- SP用フローティングボトムナビ（`$this->request->isMobile()` で制御）
- SPナビ項目：Home / 都道府県 / 新着 / ピックアップ / Map検索（計5項目）

### 店舗詳細UI改善（`View/Stores/detail.ctp`）
- 店舗名 + タグ欄を `<div class="store-header">` カードにまとめ
- 基本情報を `<div class="store-info-card">` + `.info-row` / `.label` / `.value` 構造に変更（旧: table）
- 下部エリアリンクボタンをアウトラインボタンに統一
- LocalBusiness JSON-LD 構造化データを出力

### NEWバッジ統一（Phase10/11）
- 旧：`<span class="new">new</span>`（各所でバラバラ）
- 新：`<span class="icon color7">NEW</span>` に統一
- color7 = 赤系（`#e53935`）でNEWの目立ちを確保

### ボタン設計調整（Phase13/15）
- 主ボタン（ヒーロー検索ボタン等）：塗りつぶし緑
- 補助ボタン（エリアリンク / 戻るボタン）：アウトライン（白背景 + 緑枠 + 緑文字）
- hover時：薄緑背景（`rgba(46,125,50,0.08)`）

### ナビゲーション改善
- PCナビのドロップダウン（都道府県プルダウン）廃止、シンプルなリンクに変更
- ヘッダーをwhite背景・56px固定高さに変更（Phase8）
- ロゴ下線削除（Phase12）

---

## 4. UI設計ルール

### カードデザイン
```
.store-card
├── .store-card__img（画像 / noimage）
└── .store-card__body
    ├── .store-card__tags（アイコンバッジ群）
    ├── .store-card__name（店舗名）
    ├── .store-card__area（都道府県 + 市区町村）
    ├── .store-card__station（最寄駅）
    ├── .store-card__visit-date（訪問日ピル）
    └── .store-card__comment（コメント3行）
```

### ボタン設計
| 種別 | クラス | スタイル |
|------|--------|---------|
| 主ボタン | `.rn-hero__btn` | 塗りつぶし緑 |
| 補助ボタン | `.rn-detail__area-btn` `.rn-mati-back-btn` `.rn-results__back-btn` | アウトライン（白+緑枠） |
| タグボタン | `.rn-tag-btn` | 枠線グレー系 |

### タグ表示ルール
| クラス | 色 | 意味 |
|--------|-----|------|
| `icon color1` | ピックアップ色 | ピックアップ |
| `icon color2` | 青系 | ノーレートフリー |
| `icon color3` | 緑系 | 健康麻雀 |
| `icon color4` | 紫系 | 訪問済み |
| `icon color5` | オレンジ系 | 競技麻雀 |
| `icon color6` | 黄系 | 要電話 |
| `icon color7` | 赤系(`#e53935`) | NEW |

### 余白設計
- セクション間：`margin-bottom: 40px`
- セクションタイトル下：`margin-bottom: 20px`
- カード内padding：`14px`
- hero section：`margin-top: 16px; border-radius: 12px`

### カラー設計
```css
:root {
    --rn-green:      #2e7d32;   /* メイン緑 */
    --rn-green-dark: #1b5e20;   /* 濃い緑（hover） */
    --primary:       #2e7d32;   /* --rn-green と同値 */
    --primary-light: #4caf50;   /* 薄い緑 */
}
/* フッター背景: #1c2b1c */
/* 訪問日ラベル文字: #1b5e20 */
/* 訪問日ラベル背景: rgba(46,125,50,0.1) */
```

### hoverルール
- テキストリンク：`opacity: 0.9`
- カードリンク・エリアボタン：opacity は 1 に戻し、transform/background で表現
- アウトラインボタン：`background: rgba(46,125,50,0.08)` + 枠色を濃い緑に

---

## 5. SEO設計

### title設計ルール
- Controller で `$this->set('page_title', '...')` を明示的にセット
- `page_title` がある場合はそれを優先
- ない場合は `sub_title` + フォールバックロジック（`default.ctp`）
- トップページ：`ノーレート麻雀ナビ｜全国の健康麻雀・フリー雀荘検索`
- 都道府県ページ：`〇〇の健康麻雀・ノーレート雀荘一覧（N件）｜ノーレート麻雀ナビ`
- 店舗詳細：`店舗名｜都道府県市区町村の紹介`

### meta description
- `$meta_description` がセットされていればそれを使用
- 未セット時は `sub_title` ベースのテンプレート文を使用
- 店舗詳細ページ：`店舗名は〇〇の健康麻雀〜。住所。コメント120文字...` の形式で自動生成

### canonical
```php
$_page_url = 'https://kenko-norate-mahjong.com' . $this->request->here;
<link rel="canonical" href="<?php echo h($_page_url); ?>">
```

### og:url
```php
<meta property="og:url" content="<?php echo h($_page_url); ?>">
```

### noindex制御
```php
// Controller側で設定
$this->set('noindex', true);
// → <meta name="robots" content="noindex, follow">
```

### 内部リンク設計
- フッターに都道府県別リンクグリッド（全都道府県 × 件数表示）
- 店舗詳細下部に「〇〇県のお店一覧」「〇〇市のお店一覧」ボタン
- 市区町村一覧に「〇〇県の全エリアを見る」ボタン

### 構造化データ（LocalBusiness JSON-LD）
店舗詳細ページ（`View/Stores/detail.ctp`）に出力：
```json
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "店舗名",
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "JP",
    "addressRegion": "都道府県",
    "addressLocality": "市区町村",
    "streetAddress": "番地"
  },
  "description": "コメント200文字",
  "image": "画像URL",
  "sameAs": "https://twitter.com/アカウント",
  "url": "ページURL"
}
```

---

## 6. データ設計

### m_stores テーブルの主要カラム
| カラム | 型 | 用途 |
|--------|-----|------|
| `store_name` | varchar(255) | 店舗名 |
| `pref_id` | int | 都道府県ID |
| `mati` | varchar(255) | 市区町村 |
| `address` | varchar(255) | 住所 |
| `station` | varchar(255) | 最寄駅 |
| `comment` | text | コメント |
| `free_word_text` | text | 自由記述（検索対象） |
| `visit_flg` | int | 訪問済みフラグ（0/1） |
| `visit_date` | date | 訪問日（YYYY-MM-DD） |
| `new_flg` | int | 新着フラグ |
| `pickup_flg` | int | ピックアップフラグ |
| `kenko_flg` | int | 健康麻雀フラグ |
| `norate_flg` | int | ノーレートフリーフラグ |
| `kyogi_flg` | int | 競技麻雀フラグ |
| `yoyaku_flg` | int | 要電話フラグ |
| `close_flg` | int | 閉店フラグ |
| `status` | int | 表示フラグ（1=表示） |
| `deleted` | tinyint | 論理削除（SoftDeletable） |
| `store_mime_1〜4` | varchar | 画像MIMEタイプ（存在確認に使用） |
| `store_imgdat_1〜4` | mediumblob | 画像バイナリ |

### 訪問日の重要性
- 管理人が実際に訪問した証拠
- サイトの信頼性の根拠
- `visit_flg = 1` かつ `visit_date` が入っていて初めて意味を持つ
- 一覧ページ・検索結果で訪問日が新しい店舗を優先表示することで鮮度を担保

### 表示ルール
- `status = 1` の店舗のみ表示（削除済みは `deleted = 1` でSoftDeletableが自動除外）
- `close_flg = 1` の店舗も表示するが、閉店バッジを表示 + カードを視覚的に薄く
- 画像は `store_mime_1` が入っているかどうかでサーバーサイド判定（空ならnoimage表示）

---

## 7. 並び順ルール

### 基本方針
**すべての店舗一覧は `visit_date DESC, id DESC` を標準とする。**

### 適用対象ページ
| ページ | Controller | 並び順 |
|--------|-----------|--------|
| トップ新着 | `AppController::beforeFilter` | `visit_date DESC, id DESC` |
| トップピックアップ | `AppController::beforeFilter` | `visit_date DESC, id DESC` |
| 都道府県一覧 | `PrefsController::list` | `visit_date DESC, id DESC` |
| 市区町村一覧 | `MatisController::list` | `visit_date DESC, id DESC` |
| 検索結果 | `SearchController::store_list` | `visit_date DESC, id DESC` |
| 新着ページ | `NewStoresController::index` | AppController経由で継承 |
| ピックアップページ | `PickupStoresController::index` | AppController経由で継承 |

### CakePHP2でのorder指定
```php
// 文字列形式（推奨）
$order = 'Stores.visit_date DESC, Stores.id DESC';
$store_list = $this->Utility->getStores($cond, $order);
```

---

## 8. 技術構成

### フレームワーク・環境
- **CakePHP**：2.10.15
- **PHP**：7.4
- **DB**：MySQL 5.7
- **開発環境**：Docker（`mahjang_web` + `mahjang_db` コンテナ）
- **本番環境**：Lolipop レンタルサーバー（共有ホスティング）

### Dockerコンテナ構成
```
mahjang_web : PHP7.4 Apache
mahjang_db  : MySQL5.7
```

### 定数・設定
- `TEST` 定数：URLプレフィックス（本番・開発ともに `''` 空文字）
- `prefectures_id` Configure：都道府県ID→名称マッピング（`app_config.php`で定義）

### UtilityComponent（`Controller/Component/UtilityComponent.php`）
- `getStores($cond, $order, $limit)`：店舗データ取得の共通メソッド
- `getPrefsCount()`：都道府県別件数取得
- `createPankuzu($pref_id, $mati, $store_id)`：パンくず生成
- **`getStores()` の取得フィールド**（BLOBは除く）：id, create_date, update_date, pickup_flg, store_name, kenko_flg, norate_flg, kyogi_flg, yoyaku_flg, visit_flg, **visit_date**, blog_url, homepage_1_title〜3_title, homepage_1_url〜3_url, comment, pref_id, mati, address, close_flg, status, station, free_word_text, new_flg, twitter, store_mime_1〜4

### AppController::beforeFilter() の役割
- HTTPS強制リダイレクト（`debug=0` かつ 本番環境時）
- `Security` コンポーネントのCSRF/フォーム検証は **無効化**（`validatePost = false`, `csrfCheck = false`）
- 都道府県リスト・新着10件・ピックアップ10件をすべてのページに注入

### View構造
```
View/
├── Layouts/
│   ├── default.ctp    ← HTML全体・head・SEOタグ
│   ├── header.ctp     ← ヘッダー（ロゴ）
│   ├── menubar.ctp    ← PCナビ
│   └── footer.ctp     ← フッター（都道府県グリッド + SPボトムナビ）
├── Elements/
│   └── store_card.ctp ← 店舗カード（共通部品）
├── TopPages/index.ctp
├── Stores/detail.ctp
├── Prefs/list.ctp / pref_list.ctp
├── Matis/list.ctp
├── Search/index.ctp / store_list.ctp
├── NewStores/index.ctp
├── PickupStores/index.ctp
└── GoogleMaps/index.ctp
```

---

## 9. 主な変更ファイル

### Layout（`View/Layouts/`）
- `default.ctp`：slideshow削除、SEOタグ整備、body_class属性
- `header.ctp`：変更なし（ロゴHTML構造は `<a><h1 id="logo">` の順）
- `menubar.ctp`：都道府県ドロップダウン廃止
- `footer.ctp`：全面再設計（都道府県グリッド + SPボトムナビ）

### Controller（`Controller/`）
- `AppController.php`：Securityコンポーネント追加・CSRF無効化・新着/ピックアップ並び順変更・shuffle削除
- `SearchController.php`：keywordフィールド追加・6カラムOR検索・ANDキーワード
- `PrefsController.php`：並び順 `visit_date DESC` 追加
- `MatisController.php`：並び順を `visit_date DESC` に変更

### View（`View/`）
- `TopPages/index.ctp`：ヒーロー検索フォーム（keyword化）・エリアカードnoimage対応
- `Stores/detail.ctp`：store-headerカード化・info-cardテーブル→div変換・JSON-LD
- `Search/index.ctp`：フィールドkeyword化・ラベル変更
- `Prefs/list.ctp`・`pref_list.ctp`：noimage onerrorフォールバック
- `Matis/list.ctp`：noimage onerrorフォールバック
- `GoogleMaps/index.ctp`：iframe src を `/d/u/0/embed?...&noprof=1` 形式に変更

### Element（`View/Elements/`）
- `store_card.ctp`：noimage対応・NEWバッジ統一・訪問日表示追加

### CSS（`webroot/css/style.css`）
Phase1〜15 を末尾追記方式で積み上げ（既存CSSは原則変更なし）

---

## 10. 移植時の注意点（free-mj.com向け）

### データ構造の確認
- `m_stores` テーブルのカラム名が同一かどうか必ず確認する
- `visit_date` カラムが存在しない場合は追加が必要
- `free_word_text` カラムが存在しない場合は検索対象から除外する

### Controller/Component の確認
- `UtilityComponent::getStores()` の `$fields` に `visit_date` が含まれているか確認
- `AppController::beforeFilter()` で同様の新着/ピックアップ取得を行っているか確認
- `SearchController` のキーワード検索ロジックが存在しない場合は移植が必要

### URL・定数
- `TEST` 定数の定義場所と値を確認
- ドメイン（canonical, og:url, JSON-LDの`url`）の書き換えが必要

### CSS
- `style.css` を全コピーすると既存デザインを壊す可能性がある
- Phase別ブロックを確認し、必要なブロックだけを抽出して移植する
- CSS変数（`--rn-green` 等）が存在しない場合は先に変数定義ブロックを追加する

### 直接上書き禁止
- `Config/database.php` は本番設定が入っているため上書き厳禁
- `app/tmp/` は上書き厳禁（デプロイ後にキャッシュクリアが必要）
- 移植後は必ず `app/tmp/cache/models/` と `app/tmp/cache/persistent/` を空にする

---

## 11. 実装フェーズ（CSS Phase対応表）

### Phase1：各ページ基本スタイル
トップ・検索結果・店舗詳細・新着/ピックアップ・都道府県/市区町村の新規CSS

### Phase2：グローバルレイアウト
コンテンツ幅・リンクページ・お問い合わせページ・共通デザイン・GoogleMapsページ

### Phase3：デザイン近代化
カラー・フォント・カードレイアウトの刷新

### Phase4：最終仕上げ・モバイル
SPレイアウト・ボタン・ナビゲーション最終調整

### Phase5：マイクロ調整
細部の余白・フォントサイズ微調整

### Phase6：noimage・検索改善
noimage CSS表示（`::after`方式）

### Phase7：フッター再設計
ダーク緑フッター・都道府県グリッド・SPボトムナビ

### Phase8：UI改革
ヘッダー白背景56px・行間1.75・コメントline-clamp

### Phase9：UI仕上げ
カラー変数上書き（`#44a00d` → `#2e7d32`）・store-headerカード・セクション余白

### Phase10：最終仕上げ
NEWバッジ赤統一・info-cardスタイル・タグサイズ・hover透過

### Phase11：マイクロツイーク
NEWバッジ色調整・SP縦積み・hover微調整

### Phase12：ロゴ・見出し調整
ロゴ下線削除・フォントサイズ・トップページ見出し罫線

### Phase13：詳細ページエリアボタン
アウトラインボタン化（`.rn-detail__area-btn`）

### Phase14：店舗カード訪問日
訪問日ピルラベル（`.store-card__visit-date`）

### Phase15：アウトラインボタン統一
`.rn-mati-back-btn` / `.rn-results__back-btn` をアウトライン化
