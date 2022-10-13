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
    <script type="text/javascript" src="https://ajaxzip3.github.io/ajaxzip3.js" charset="utf-8"></script>
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
            <a th:href="@{/toInsert}">会員登録</a>
            <a th:href="@{/toLogin}" class="login">
              <i class="fas fa-sign-in-alt"></i>ログイン
            </a>
          </div>
        </div>
      </div>
    </header>
    <form action="{{ route('register_user') }}" method="POST">
      @csrf

    <div class="top-wrapper">
      <div class="container">
        <div class="row register-page">
          {{-- <div class="error">名前を入力して下さい</div> --}}
          <div class="row">
            <div class="input-field col s12">
              <x-input-label for="name" :value="__('氏名')" />

                <x-text-input id="name" class="validate" type="text" name="name" :value="old('name')"  />

                <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: red" />
              {{-- <input id="name" type="text" class="validate" value="{{ old('name') }}">
              <label for="name">氏名</label>
              @error('name')
              <span class="error">名前を入力して下さい</span>
              @enderror --}}
            </div>
          </div>
          {{-- <div class="error">メールアドレスの形式が不正です</div> --}}
          <div class="row">
            <div class="input-field col s12">
              <x-input-label for="email" :value="__('メールアドレス')" />

                <x-text-input id="email" class="validate" type="text" name="email" :value="old('email')"  />

                <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red"/>
              {{-- <input id="email" type="email" class="validate" value="{{ old('email') }}">
              <label for="email">メールアドレス</label>
              @error('email')
              <span class="error">メールアドレスの形式が不正です</span>
              @enderror --}}
            </div>
          </div>
          {{-- <div class="error">郵便番号はXXX-XXXXの形式で入力してください</div> --}}
          <div class="row">
            <div class="input-field col s12">
              <x-input-label for="zipcode" :value="__('郵便番号')"/>

                <x-text-input id="zipcode" class="validate" type="text" name="zipcode" :value="old('zipcode')" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" />

                <x-input-error :messages="$errors->get('zipcode')" class="mt-2" style="color: red"/>
              {{-- <input id="zipcode" type="text" value="{{ old('zipcode') }}">
              <label for="zipcode">郵便番号</label>
              @error('zipcode')
              <span class="error">郵便番号はXXX-XXXXの形式で入力してください</span>
              @enderror --}}
              {{-- <button class="btn" type="button">
                <span>住所検索</span>
              </button> --}}
            </div>
          </div>
          {{-- <div class="error">住所を入力して下さい</div> --}}
          <div class="row">
            <div class="input-field col s12">
              <x-input-label for="address" :value="__('住所')" />

                <x-text-input id="address" class="validate" type="text" name="address" :value="old('address')"  />

                <x-input-error :messages="$errors->get('address')" class="mt-2" style="color: red"/>
              {{-- <input id="address" type="text" value="{{ old('address') }}">
              <label for="address">住所</label>
              @error('address')
              <span class="error">住所を入力してください</span>
              @enderror --}}
            </div>
          </div>
          {{-- <div class="error">
            電話番号はXXXX-XXXX-XXXXの形式で入力してください
          </div> --}}
          <div class="row">
            <div class="input-field col s12">
              <x-input-label for="telephone" :value="__('電話番号')" />

                <x-text-input id="telephone" class="validate" type="text" name="telephone" :value="old('telephone')"  />

                <x-input-error :messages="$errors->get('telephone')" class="mt-2" style="color: red"/>
              {{-- <input id="telephone" type="tel" value="{{ old('telephone') }}">
              <label for="telephone">電話番号</label>
              @error('telephone')
              <span class="error">電話番号を入力してください</span>
              @enderror --}}
            </div>
          </div>
          {{-- <div class="error">
            パスワードは８文字以上１６文字以内で設定してください
          </div> --}}
          <div class="row">
            <div class="input-field col s12">
              <x-input-label for="password" :value="__('パスワード')" />

                <x-text-input id="password" class="validate"
                                type="password"
                                name="password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red"/>
              {{-- <input
                id="password"
                type="password"
                class="validate"
                minlength="8"
              />
              <label for="password">パスワード</label>
              @error('password')
              <span class="error">パスワードは８文字以上１６文字以内で設定してください</span>
              @enderror --}}
            </div>
          </div>
          {{-- <div class="error">パスワードと確認用パスワードが不一致です</div> --}}
          <div class="row">
            <div class="input-field col s12">
              <x-input-label for="password_confirmation" :value="__('確認用パスワード')" />

                <x-text-input id="password_confirmation" class="validate"
                                type="password"
                                name="password_confirmation"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red"/>
              {{-- <input
                id="confirmation_password"
                type="password"
                class="validate"
                minlength="8"
              />
              <label for="confirmation_password">確認用パスワード</label> --}}
            </div>
          </div>
          <div class="row register-admin-btn">
            <button
              class="btn"
              type="submit"
            >
              <span>登録<i class="material-icons right">done</i></span>
            </button>
          </div>
        </div>
      </div>
      <!-- end container-->
    </div>
    </form>
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