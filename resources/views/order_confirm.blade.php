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
    <script type="text/javascript" src="https://ajaxzip3.github.io/ajaxzip3.js" charset="utf-8"></script>
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
        <h1 class="page-title">注文内容確認</h1>
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
            @foreach($orderConfirms as $orderConfirm)
            <tbody>
              <tr>
                <td class="cart-item-name">
                  <div class="cart-item-icon">
                    <img src="{{ $orderConfirm->image_path }}" />
                  </div>
                  <span>{{ $orderConfirm->name }}</span>
                </td>
                <td>
                  <span class="price">&nbsp;{{ $orderConfirm->type }}</span>
                  @if ($orderConfirm->type == 'e-book')
                  &nbsp;&nbsp;{{ number_format($orderConfirm->price_data) }}円
                  @else
                  &nbsp;&nbsp;{{ number_format($orderConfirm->price_paperbook) }}円
                  @endif
                  &nbsp;&nbsp;{{ $orderConfirm->quantity }}個
                </td>
                {{-- <td>
                  <ul>
                    <li>ピーマン300円</li>
                    <li>オニオン300円</li>
                    <li>あらびきソーセージ300円</li>
                  </ul>
                </td> --}}
                @if ($orderConfirm->type == 'e-book')
                <td><div class="text-center">{{ number_format($orderConfirm->price_data) }}円</div></td>
                @else
                <td><div class="text-center">{{ number_format($orderConfirm->price_paperbook) }}円</div></td>
                @endif
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>

        <?php
        $totalPrice = 0;
        foreach($orderConfirms as $orderConfirm) {
          $totalPrice += $orderConfirm->total_price;
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

      <form action="{{ route('create_order') }}" method="POST">
        @csrf
        <h2 class="page-title">お届け先情報</h2>
        <div class="order-confirm-delivery-info">
          <div class="row">
            <div class="input-field">
              <input id="destination_name" type="text" value="{{ $user->name }}" />
              <label for="destination_name">お名前</label>
              @error('destination_name')
              <span style="color: red">名前を入力してください</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="input-field">
              <input id="destination_email" type="email" value="{{ $user->email }}" />
              <label for="destination_email">メールアドレス</label>
              @error('destination_email')
              <span style="color: red">メールアドレスの形式が不正です</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="input-field">
              <input id="destination_zipcode" type="text" value="{{ $user->zipcode }}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" />
              <label for="destination_zipcode">郵便番号</label>
              {{-- <button class="btn" type="button">
                <span>住所検索</span>
              </button> --}}
              @error('destination_zipcode')
              <span style="color: red">郵便番号はXXX-XXXXの形式で入力してください</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="input-field">
              <input id="destination_address" name="address" type="text" value="{{ $user->address }}"/>
              <label for="destination_address">住所</label>
              @error('destination_address')
              <span style="color: red">住所を入力してください</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="input-field">
              <input id="destination_tel" type="tel" value="{{ $user->telephone }}"/>
              <label for="destination_tel">電話番号</label>
              @error('destination_tel')
              <span style="color: red">電話番号はXXXX-XXXX-XXXXの形式で入力してください</span>
              @enderror
            </div>
          </div>
          <div class="row order-confirm-delivery-datetime">
            <div class="input-field">
              <input id="deliveryDate" type="date" />
              <label for="address">配達日時</label>
            </div>
            <label class="order-confirm-delivery-time">
              <input name="delivery_time" type="radio" value="10" checked="checked" />
              <span>10時</span>
            </label>
            <label class="order-confirm-delivery-time">
              <input name="delivery_time" type="radio" value="11" />
              <span>11時</span>
            </label>
            <label class="order-confirm-delivery-time">
              <input name="delivery_time" type="radio" value="12" />
              <span>12時</span>
            </label>
            <label class="order-confirm-delivery-time">
              <input name="delivery_time" type="radio" value="13" />
              <span>13時</span>
            </label>
            <label class="order-confirm-delivery-time">
              <input name="delivery_time" type="radio" value="14" />
              <span>14時</span>
            </label>
            <label class="order-confirm-delivery-time">
              <input name="delivery_time" type="radio" value="15" />
              <span>15時</span>
            </label>
            <label class="order-confirm-delivery-time">
              <input name="delivery_time" type="radio" value="16" />
              <span>16時</span>
            </label>
            <label class="order-confirm-delivery-time">
              <input name="delivery_time" type="radio" value="17" />
              <span>17時</span>
            </label>
            <label class="order-confirm-delivery-time">
              <input name="delivery_time" type="radio" value="18" />
              <span>18時</span>
            </label>
            @error('delivery_time')
              <span style="color: red">今から３時間後以降の日時をご入力ください</span>
              @enderror
          </div>
        </div>

        <h2 class="page-title">お支払い方法</h2>
        <div class="row order-confirm-payment-method">
          <span>
            <label class="order-confirm-payment-method-radio">
              <input
                name="payment_method"
                type="radio"
                value="1"
                checked="checked"
              />
              <span>代金引換</span>
            </label>
            <label class="order-confirm-payment-method-radio">
              <input name="payment_method" type="radio" value="2" />
              <span>クレジットカード</span>
            </label>
            @error('payment_method')
              <span style="color: red">お支払い方法を選択してください</span>
              @enderror
          </span>
        </div>
        <div class="row order-confirm-btn">
          <button
            class="btn"
            type="submit"
          >
            <span>この内容で注文する</span>
          </button>
        </div>
      </form>
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