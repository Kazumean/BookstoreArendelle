<!DOCTYPE html>
<html lang="ja">
  <head>
    <!--Import Google Icon Font-->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!-- Import Materialize CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <!-- Import Font Wesome -->
    <link
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/register_admin.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/item_list.css" />
    <link rel="stylesheet" href="css/item_detail.css" />
    <link rel="stylesheet" href="css/cart_list.css" />
    <link rel="stylesheet" href="css/order_confirm.css" />
    <link rel="stylesheet" href="css/order_finished.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="header">
          <div class="header-left">
            <a href="top.html">
              <img class="logo" src="img/header_logo2.jpg" />
            </a>
          </div>

          <div class="header-right">
            <a href="item_list.html">商品一覧</a>
            <a th:href="@{/toInsert}">会員登録</a>
            <a th:href="@{/toLogin}" class="login">
              <i class="fas fa-sign-in-alt"></i>ログイン
            </a>
          </div>
        </div>
      </div>
    </header>
    <div class="top-wrapper">
      <div class="container">
        <div class="row register-page">
          <div class="error">名前を入力して下さい</div>
          <div class="row">
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate" required />
              <label for="last_name">姓</label>
            </div>
            <div class="input-field col s6">
              <input id="first_name" type="text" class="validate" required />
              <label for="first_name">名</label>
            </div>
          </div>
          <div class="error">メールアドレスの形式が不正です</div>
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate" required />
              <label for="email">メールアドレス</label>
            </div>
          </div>
          <div class="error">郵便番号はXXX-XXXXの形式で入力してください</div>
          <div class="row">
            <div class="input-field col s12">
              <input id="zipcode" type="text" maxlength="8" />
              <label for="zipcode">郵便番号</label>
              <button class="btn" type="button">
                <span>住所検索</span>
              </button>
            </div>
          </div>
          <div class="error">住所を入力して下さい</div>
          <div class="row">
            <div class="input-field col s12">
              <input id="address" type="text" />
              <label for="address">住所</label>
            </div>
          </div>
          <div class="error">
            電話番号はXXXX-XXXX-XXXXの形式で入力してください
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="tel" type="tel" />
              <label for="tel">電話番号</label>
            </div>
          </div>
          <div class="error">
            パスワードは８文字以上１６文字以内で設定してください
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input
                id="password"
                type="password"
                class="validate"
                minlength="8"
                required
              />
              <label for="password">パスワード</label>
            </div>
          </div>
          <div class="error">パスワードと確認用パスワードが不一致です</div>
          <div class="row">
            <div class="input-field col s12">
              <input
                id="confirmation_password"
                type="password"
                class="validate"
                minlength="8"
                required
              />
              <label for="confirmation_password">確認用パスワード</label>
            </div>
          </div>
          <div class="row register-admin-btn">
            <button
              class="btn"
              type="button"
              onclick="location.href='login.html'"
            >
              <span>登録<i class="material-icons right">done</i></span>
            </button>
          </div>
        </div>
      </div>
      <!-- end container-->
    </div>
    <!-- end top-wrapper -->
    <footer>
      <div class="container">
        <img src="img/header_logo.png" />
        <p>アロハな気分をあなたにお届け！</p>
      </div>
    </footer>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>