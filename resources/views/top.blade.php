<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/top.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    <link
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      rel="stylesheet"
    />
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
            <a href="cart_list.html"
              ><i class="fas fa-shopping-cart"></i>カート</a
            >
            <a href="{{ route('login_user') }}" class="login">
              <i class="fas fa-sign-in-alt"></i>ログイン
            </a>
          </div>
        </div>

        <!-- スマートフォン用のメニューアイコン -->
        <div class="menu-icon">
          <span class="fa fa-bars"></span>
        </div>
      </div>
    </header>

    <div class="top-wrapper">
      <div class="container">
        <h1>DELIVERING THE ADVENTURES AROUND THE WORLD TO YOU</h1>
        <p>日本にいながら世界中の冒険をあなたにお届け！</p>
        <p>
          Bookstore Arendelle は世界中の本のお取り寄せサイトです。
        </p>
        <div class="btn-wrapper">
          <a href="{{ route('register_user') }}" class="btn signup">会員登録</a>
          <p>or</p>
          <a href="#" class="btn facebook"
            ><i class="fab fa-facebook"></i>Facebookで登録</a
          >
          <a href="#" class="btn twitter"
            ><i class="fab fa-twitter"></i>Twitterで登録</a
          >
        </div>
      </div>
    </div>

    <div class="top-item-wrapper">
      <div class="container">
        <div class="heading">
          <h2>Bookstore Arendelle ４つの特徴</h2>
        </div>
        <div class="top-items">
          <div class="top-item">
            <div class="top-item-icon">
              <img src="img/books.jpg" />
              <p>様々なジャンル</p>
            </div>
            <p class="text-contents">
              文学や評論のみならず、ノンフィクションや趣味・実用など、様々なジャンルの本を豊富にお取り扱いしております。コミックスのお取り扱いもございます。
            </p>
          </div>
          <div class="top-item">
            <div class="top-item-icon">
              <img src="img/people_of_the_world.jpg" />
              <p>世界中の本を読める</p>
            </div>
            <p class="text-contents">
              世界各国の本を取り揃えております。大きな本屋さんでもなかなか手に入らない本を、お手軽に楽しむことができます。
            </p>
          </div>
          <div class="top-item">
            <div class="top-item-icon">
              <img src="img/e-book.jpg" />
              <p>e-bookのお取り扱い</p>
            </div>
            <p class="text-contents">
              本店でお取り扱いのある本は、すべてe-bookと紙媒体を選択することができます。e-bookであれば、紙媒体よりもお安く、その場で作品をお楽しみいただけます。タブレットやスマートフォンからいつでも好きなときに読書を楽しめるe-bookをぜひご活用ください。
            </p>
          </div>
          <div class="top-item">
            <div class="top-item-icon">
              <img src="img/search.jpg" />
              <p>充実した検索機能</p>
            </div>
            <p class="text-contents">
              世界各国の本を、国名や地域名から検索してご購入いただけます。原語の本も多数ございますので、ぜひ世界中の言葉で本の世界を冒険してください。
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="message-wrapper">
      <div class="container">
        <div class="heading">
          <h2>さぁ、本で世界を冒険しよう！</h2>
          <h3>Let's read books around the world!!</h3>
        </div>
        <a href="{{ route('books.index') }}">
        <span class="btn message">本で世界を冒険する！</span>
        </a>
      </div>
    </div>

    <footer>
      <div class="container">
        <img src="{{ asset('img/header_logo2.jpg') }}" />
        <p>Let's read books around the world!!</p>
      </div>
    </footer>
  </body>
</html>