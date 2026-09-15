# TP_HotelSystem
# 宿泊施設予約システム 設計書・Webサイト構成

---

## システム全体像

### 🔷 フロントエンド（利用者向け）

- **Home page**（トップページ）
- **Rooms**（部屋一覧・空室検索・詳細表示）
- **Facilities**（施設・アメニティ紹介）
- **Contact Us**（お問い合わせ）
- **About Us**（運営情報・概要）
- **My Account**
  - Profile（プロフィール編集）
  - Bookings（予約管理・履歴・キャンセル）
  - Reviews & Ratings（レビュー投稿・閲覧）
- **Checkout**（オンライン決済）
- **Search Results**（空室検索結果）
- **Particular Room**（部屋詳細ページ）

### 🔷 管理者用（Admin End）

- Rooms（部屋管理・追加/変更/削除/設備・サービス編集）
- Users（ユーザー管理・削除/バン/解除）
- Booking（予約管理・到着/キャンセル/返金/請求書発行/履歴）
- Review & Rating（レビュー管理・不適切内容削除等）

---

## 主要機能一覧

| 機能名                           | 詳細説明                                                                                  |
|----------------------------------|-----------------------------------------------------------------------------------------|
| 部屋タイプ・設備の詳細表示        | 写真や見取り図、アメニティ、広さ、ビュー（眺望）などを詳細に表示                         |
| 空室状況のリアルタイム表示        | 希望日程・人数に応じてリアルタイムで空室状況を表示                                       |
| 料金比較・最安値保証             | 異なるプランや日程ごとの料金自動比較、最安値保証表示                                     |
| レビュー・口コミ表示              | 宿泊者の評価やコメント、写真レビューを掲載                                              |
| オンライン決済・領収書発行        | 複数の支払い方法対応（クレカ・電子マネー等）、領収書や請求書の自動発行                   |
| キャンセルポリシー明示・柔軟対応   | キャンセル規定の明確表示、柔軟なキャンセル・変更対応                                     |
| マイページ・予約管理              | 予約履歴の一覧、変更・キャンセル、リピート予約の簡易化                                   |
| 特別リクエスト・備考欄            | 予約時に要望・備考を記入可能                                                             |

---

## バックエンド・技術スタック

- PHP（API/サーバーサイドロジック）
- MySQL（RDBMS）
- HTML, CSS, JavaScript, Bootstrap5, AJAX（フロントエンド）
- 管理画面もPHP+HTMLで構成

---

## 各画面・ページ構成

```
/
  index.php             ... ホーム
  rooms.php             ... 部屋検索・一覧
  room_detail.php       ... 部屋詳細
  facilities.php        ... 施設案内
  about.php             ... 施設・運営情報
  contact.php           ... お問い合わせ
  search_results.php    ... 空室検索結果
  myaccount/
    profile.php         ... プロフィール管理
    bookings.php        ... 予約管理・変更・キャンセル
    reviews.php         ... レビュー一覧・投稿
  checkout.php          ... 決済
  admin/
    rooms.php           ... 部屋管理
    users.php           ... ユーザー管理
    bookings.php        ... 予約管理
    reviews.php         ... レビュー管理
```

---

## 参考：画面・機能要件（画像より）

### User End
- Book hotel rooms
- Check booking availability
- Manage bookings（modify/cancel）
- Give review and ratings
- User login/registration
- Profile management

### Admin End
- Room management（add/modify/delete）
- Manage users（view/delete/ban/unban）
- Booking management（arrival, checkout, refund, finalize, invoice）
- Room features/services管理
- Review & rating管理
- Shutdown website

### Front End
- HTML, CSS, JavaScript, AJAX
- Bootstrap5
- 各種プラグイン・ライブラリ（アニメーション、請求書、カルーセル等）

---

## サンプル画面・コード例

> 各画面・機能のPHP/HTML/SQLサンプルは必要に応じて個別にご提案可能です。  
> 実装例をご希望の機能ごとにご指示ください。

## セットアップ

1. XAMPPでApacheとMySQLを起動します。
2. phpMyAdminで`database.sql`をインポートします。
3. ブラウザで`http://localhost/TP_HotelSystem-main/`を開きます。

データベース接続は`db.php`で管理しています。初期値は、ホスト`127.0.0.1`、データベース`hotel_system`、ユーザー`root`、パスワード空欄です。必要に応じて`HOTEL_DB_HOST`、`HOTEL_DB_NAME`、`HOTEL_DB_USER`、`HOTEL_DB_PASSWORD`の環境変数で変更できます。

---
