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
            <a href="{{ route('show.top') }}">
              <img class="logo" src="img/header_logo2.jpg" />
            </a>
          </div>

          <div class="header-right">
            <a href="item_list.html">商品一覧</a>
            <a href="{{ route('register_user') }}">会員登録</a>
            {{-- <a href="login.html" class="login">
              <i class="fas fa-sign-in-alt"></i>ログイン
            </a> --}}
          </div>
        </div>
      </div>
    </header>
    <div class="top-wrapper">
      <div class="container">
        <div class="row login-page">
          <div class="col s12 z-depth-6 card-panel">
            {{-- <div class="error">エラーメッセージ</div> --}}
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red" />
            <form class="login-form" action="{{ route('login_user') }}" method="POST">
              @csrf

              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">mail_outline</i>
                  <x-input-label for="email" :value="__('メールアドレス')" />

                  <x-text-input id="email" class="validate" type="email" name="email" :value="old('email')" />

                  {{-- <input class="validate" id="mailAddress" type="email" />
                  <label
                    for="mailAddress"
                    data-error="wrong"
                    data-success="right"
                    >メールアドレス</label
                  > --}}
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">lock_outline</i>
                  <x-input-label for="password" :value="__('パスワード')" />

                  <x-text-input id="password" 
                                type="password"
                                name="password"/>

                  {{-- <input id="password" type="password" />
                  <label for="password">パスワード</label> --}}
                </div>
              </div>
              
              <div class="row login-btn">
                <button
                  class="btn"
                  type="submit"
                >
                  <span>ログイン</span>
                </button>
              </div>
              <div class="row">
                <div class="input-field col s6 m6 l6">
                  <p class="margin medium-small">
                    <a href="{{ route('register_user') }}">ユーザー登録はこちら</a>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end top-wrapper -->
    <footer>
      <div class="container">
        <img src="img/header_logo2.jpg" />
        <p>Let's read books around the world!!</p>
      </div>
    </footer>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>