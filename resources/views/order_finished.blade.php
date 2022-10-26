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
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register_admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/item_list.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/item_detail.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/cart_list.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/order_confirm.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/order_finished.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
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
              <img class="logo" src="{{ asset('img/header_logo2.jpg') }}" />
            </a>
          </div>

          <div class="header-right">
            <a href="{{ route('books.index') }}">商品一覧</a>
            <a href="{{ route('register_user') }}">会員登録</a>
            <a href="{{ route('book.showCart') }}"><i class="fas fa-shopping-cart"></i>カート</a>

            @if(Auth::check())
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout_user') }}" method="POST">
              @csrf
            </form>
            <a href="order_history.html">注文履歴</a>
            @else
            <a href="{{ route('login_user') }}" class="login">
              <i class="fas fa-sign-in-alt"></i>ログイン
            </a>
            @endif

            @if (Auth::check())
            <a>
              <i class="fas fa-solid fa-user"></i>{{ Auth::user()->name }}さん
            </a>
            @else
            <a>
              <i class="fas fa-solid fa-user"></i>ゲストユーザーさん
            </a>
            @endif

          </div>
        </div>
      </div>
    </header>
    <div class="top-wrapper">
      <div class="container">
        <h1 class="page-title">決済が完了しました！</h1>
        <div class="order-finished-thanks-message">
          <p>この度はご注文ありがとうございます。</p>
          <p>
            お支払い先は、お送りしたメールに記載してありますのでご確認ください。
          </p>
          <p>メールが届かない場合は「注文履歴」からご確認ください。</p>
        </div>
        <div class="row order-finished-btn">
          <button
            class="btn"
            type="button"
            onclick="location.href='{{ route('show.top') }}'"
          >
            <span>トップ画面を表示する</span>
          </button>
        </div>
      </div>
      <!-- end container -->
    </div>
    <!-- end top-wrapper -->
    <footer>
      <div class="container">
        <img src="{{ asset('img/header_logo2.jpg') }}" />
        <p>Let's read books around the world!!</p>
      </div>
    </footer>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>