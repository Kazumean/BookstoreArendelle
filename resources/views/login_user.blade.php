<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ネットでピザ注文</title>
    <link href="js/bootstrap.css" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button
              type="button"
              class="navbar-toggle collapsed"
              data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1"
              aria-expanded="false"
            >
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="item_list_pizza.html">
              <!-- 企業ロゴ -->
              <img
                alt="main log"
                src="../static/img_pizza/header_logo.png"
                height="35"
              />
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div
            class="collapse navbar-collapse"
            id="bs-example-navbar-collapse-1"
          >
            <p class="navbar-text navbar-right">
              <a href="cart_list.html" class="navbar-link">ショッピングカート</a
              >&nbsp;&nbsp;
            </p>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
      </nav>

      <!-- login form -->
      <div class="row">
        <div
          class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-10 col-xs-12"
        >
          <div class="well">
            <form method="post" action="item_list_pizza.html">
              <fieldset>
                <legend>ログイン</legend>
                <label class="control-label" style="color: red" for="inputError"
                  >メールアドレス、またはパスワードが間違っています</label
                >
                <div class="form-group">
                  <label for="inputEmail">メールアドレス:</label>
                  <input
                    type="text"
                    id="inputEmail"
                    class="form-control"
                    placeholder="Email"
                  />
                </div>
                <div class="form-group">
                  <label for="inputPassword">パスワード:</label>
                  <input
                    type="text"
                    id="inputPassword"
                    class="form-control"
                    placeholder="Password"
                  />
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">
                    ログイン
                  </button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="text-center">
          <a href="register_user.html">ユーザ登録はこちら</a>
        </div>
      </div>
    </div>
    <!-- end container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../static/js/bootstrap.min.js"></script>
  </body>
</html>
