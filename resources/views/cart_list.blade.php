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
        <h1 class="page-title">ショッピングカート</h1>
        <!-- table -->
        <div class="row">
          <table class="striped">
            <thead>
              <tr>
                <th class="cart-table-th">商品名</th>
                <th>タイプ、価格(税抜)、数量</th>
                {{-- <th>トッピング、価格(税抜)</th> --}}
                <th>小計</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr>
                <td class="cart-item-name">
                  <div class="cart-item-icon">
                    <img src="{{ $order->image_path }}" />
                  </div>
                  <span>{{ $order->name }}</span>
                </td>
                <td>
                  <span class="price">&nbsp;{{ $order->type }}</span>
                  @if ($order->type == 'e-book')
                  &nbsp;&nbsp;{{ number_format($order->price_data) }}円
                  @else
                  &nbsp;&nbsp;{{ number_format($order->price_paperbook) }}円
                  @endif
                  &nbsp;&nbsp;{{ $order->quantity }}個
                </td>
                {{-- <td>
                  <ul>
                    <li>ピーマン300円</li>
                    <li>オニオン300円</li>
                    <li>あらびきソーセージ300円</li>
                  </ul>
                </td> --}}

                @if ($order->type == 'e-book')
                <td><div class="text-center">{{ number_format($order->price_data * $order->quantity) }}円</div></td>
                @else
                <td><div class="text-center">{{ number_format($order->price_paperbook * $order->quantity) }}円</div></td>
                @endif

                <td>
                  <button class="btn" type="button">
                    <span>削除</span>
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <?php
        $totalPrice = 0;
        foreach ($orders as $order) {
          $totalPrice += $order->total_price;
        }
        $tax = $totalPrice * 0.1;
        $taxIncludedPrice = $totalPrice + $tax;
        $commaTax = number_format($tax);
        $commaTaxIncludedPrice = number_format($taxIncludedPrice);
        echo '<div class="row cart-total-price">';
        echo  "<div>消費税：{$commaTax}円</div>";
        echo  "<div>ご注文金額合計：{$commaTaxIncludedPrice}円 (税込)</div>";
        echo '</div>';
        ?>

        <div class="row order-confirm-btn">
          <button
            class="btn"
            type="button"
            onclick="location.href='order_confirm.html'"
          >
            <span>注文に進む</span>
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