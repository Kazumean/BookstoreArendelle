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
            <a href="cart_list.html">
              <i class="fas fa-shopping-cart"> </i>カート
            </a>
            <a href="{{ route('login_user') }}" class="login">
              <i class="fas fa-sign-in-alt"></i>ログイン
            </a>

            <a href="order_history.html">注文履歴</a>
          </div>
        </div>
      </div>
    </header>
    <div class="top-wrapper">
      <div class="container">
        <form action="{{ route('book.addItem') }}" method="POST">
          @csrf
        @foreach($books as $book)
        <h1 class="page-title">{{ $book->book_name }}</h1>
        <input type="hidden" name="item_id" value="{{ $book->book_id }}">
        <div class="row">
          <div class="row item-detail">
            <div class="item-icon">
              <img src="{{ asset($book->image_path) }}" />
            </div>
            <div class="row item-intro">
              <span class="item-hedding">著者名：</span>
              <span>
                {{ $book->author_name }}
              </span><br>
              <span class="item-hedding">カテゴリー：</span>
              <span>
                {{ $book->category_name }}
              </span><br>
              <span class="item-hedding">出版国：</span>
                <span>
                  {{ $book->country_name }}
                </span>
              </span>
              <div class="item-hedding">あらすじ</div>
                <span>
                  {{ $book->description }}
                </span>
              </div>
            </div>
          </div>
          
          <div class="row item-size">
            <div class="item-hedding">タイプ</div>
            <div>
              <label>
                <input id="type-e" name="type" type="radio" value="e-book" checked="checked" />
                <span>
                  &nbsp;<span class="price">e-book</span
                    >&nbsp;&nbsp;{{ number_format($book->price_data) }}円(税抜)</span
                    >
                  </label>
                  <label>
                    <input id="type-p" name="type" type="radio" value="paperBook"/>
                    <span>
                      &nbsp;<span class="price">ペーパーブック</span
                        >&nbsp;&nbsp;{{ number_format($book->price_paperbook) }}円(税抜)</span
                        >
                      </label>
                    </div>
                  </div>
                  
                  {{-- <div class="row item-toppings">
                    <div class="item-hedding">
                      トッピング：&nbsp;1つにつき
                      <span>&nbsp;Ｍ&nbsp;</span>&nbsp;&nbsp;200円(税抜)
                      <span>&nbsp;Ｌ</span>&nbsp;&nbsp;300円(税抜)
                    </div>
                    <div> --}}
                      {{-- <label class="item-topping">
                        <input type="checkbox" />
                        <span>ハワイアンソルト</span>
                      </label>
                      <label class="item-topping">
                        <input type="checkbox" />
                        <span>ハワイアンマヨネーズ</span>
                      </label>
                      <label class="item-topping">
                        <input type="checkbox" />
                        <span>ハワイアントマト</span>
                      </label>
                      <label class="item-topping">
                        <input type="checkbox" />
                        <span>ブルーチーズ</span>
                      </label>
                      <label class="item-topping">
                        <input type="checkbox" />
                        <span>ハワイアンチョコレート</span>
                      </label>
                      <label class="item-topping">
                        <input type="checkbox" />
                        <span>アンチョビ</span>
                      </label>
                      <label class="item-topping">
                        <input type="checkbox" />
                        <span>エビ</span>
                      </label>
                      <label class="item-topping">
                        <input type="checkbox" />
                        <span>ガーリックスライス</span>
                      </label>
                      <label class="item-topping">
                        <input type="checkbox" />
                        <span>トロピカルフルーツ</span>
                      </label>
                      <label class="item-topping">
                        <input type="checkbox" />
                        <span>ココナッツ</span>
                      </label>
                    </div>
                  </div> --}}
                  <div class="row item-quantity">
                    <div class="item-hedding item-hedding-quantity">数量</div>
                    <div class="item-quantity-selectbox">
                      <div class="input-field col s12">
                        <select name="quantity" class="browser-default">
                          <option value="" disabled selected>選択して下さい</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  {{-- <div class="row item-total-price">
                    <span>この商品金額：{{ $book->price_data }}</span> 円(税抜)</span>
                  </div> --}}
                  <div class="row item-cart-btn">
                    <button
                    class="btn"
                    type="submit"
                    >
                    <i class="material-icons left">add_shopping_cart</i>
                    <span>カートに入れる</span>
                  </button>
                </div>
              </div>
            </div>
            @endforeach
          </form>
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
