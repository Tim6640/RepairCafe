<?php
session_start();
include ("../includes/functions.php");
if (isset($_POST["login"])) {
  if (isset($_POST["login_email"]) && isset($_POST["login_password"])) {
    if (!empty($_POST["login_email"]) || !empty($_POST["login_password"])) {
      $result = loginCheck($_POST["login_email"], $_POST["login_password"]);
      if ($result["count"] == 1) {
        $_SESSION["user"]["login"] = true;
        $_SESSION["user"]["id"] = $result["info"][0]["customer_id"];
        $_SESSION["user"]["name"] = $result["info"][0]["customer_name"];
        $_SESSION["user"]["email"] = $result["info"][0]["e-mail"];
      }
    }
    else {
      $message = "Vull alle velden in!";
      $error = true;
    }
  }
}
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RepairCafe</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome and Pixeden Icon Stroke icon fonts-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- lightbox-->
    <link rel="stylesheet" href="css/lightbox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>

  <body>
    <!-- navbar-->
    <header class="header">
      <div role="navigation" class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header"><a href="index.html" class="navbar-brand">Repair Cafe Harderwijk</a>
            <div class="navbar-buttons">
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn">Menu<i class="fa fa-align-justify"></i></button>
            </div>
          </div>
          <div id="navigation" class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="repair.php">Reparatie</a></li>
              <!-- <li><a href="text.html">Text page</a></li>
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Dropdown item 1</a></li>
                  <li><a href="#">Dropdown item 2</a></li>
                  <li><a href="#">Dropdown item 3</a></li>
                  <li><a href="#">Dropdown item 4</a></li>
                </ul>
              </li> -->
              <li><a href="contact.php">Contact</a></li>
            </ul>
            <?php
              if (isset($_SESSION["user"]["login"])) {
              }
              else {
                echo '<a href="#" data-toggle="modal" data-target="#login-modal" class="btn navbar-btn btn-ghost"><i class="fa fa-sign-in"></i>Log in</a>';
              }
            ?>
          </div>
        </div>
      </div>
    </header>

    <!-- *** LOGIN MODAL ***_________________________________________________________
    -->
    <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
            <h4 id="Login" class="modal-title">Login</h4>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="form-group">
                <input id="email_modal" type="text" name="login_email" placeholder="email" class="form-control">
              </div>
              <div class="form-group">
                <input id="password_modal" type="password" name="login_password" placeholder="password" class="form-control">
              </div>
              <p class="text-center">
                <button type="submit" name="login" value="true" class="btn btn-primary"><i class="fa fa-sign-in"></i>Login</button>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- *** LOGIN MODAL END ***-->

    <div class="jumbotron main-jumbotron">
      <div class="container">
        <div class="content">
          <h1>Wegooien? Mooit niet!</h1>
          <p class="margin-bottom">Laat het nu repareren, en maak een afspraak!</p>
          <p><a href="repair.php" class="btn btn-white">Maak een reparatie aan!</a></p>
        </div>
      </div>
    </div>
    <section>
      <div class="container">
        <h2> Wie zijn wij?</h2>
        <p class="lead">Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
        <p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.</p>
        <p><a class="btn btn-ghost">Read more</a></p>
      </div>
    </section>
    <section class="background-gray-lightest">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="post">
              <div class="image"><a href="text.html"><img src="img/blog1.jpg" alt="" class="img-responsive"></a></div>
              <h3><a href="text.html">Rit eget tincidunt condimentum</a></h3>
              <p class="post__intro">ellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
              <p class="read-more"><a href="text.html" class="btn btn-ghost">Continue reading     </a></p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="post">
              <div class="image"><a href="text.html"><img src="img/blog2.jpg" alt="" class="img-responsive"></a></div>
              <h3><a href="text.html">Tempor sit amet</a></h3>
              <p class="post__intro"> Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.</p>
              <p class="read-more"><a href="text.html" class="btn btn-ghost">Continue reading     </a></p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="post">
              <div class="image"><a href="text.html"><img src="img/blog3.jpg" alt="" class="img-responsive"></a></div>
              <h3><a href="text.html">Vestibulum erat wisi</a></h3>
              <p class="post__intro">ellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
              <p class="read-more"><a href="text.html" class="btn btn-ghost">Continue reading     </a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--   *** INTEGRATIONS ***-->
    <section id="facebook">
      <div class="container clearfix">
        <div class="row services">
          <div class="col-md-12">
            <h2 class="h1">Facebook</h2>
            <div class="row">
              <div class="col-sm-6">
                <div class="box box-services">
                  <h4 class="heading">Informatie:</h4>
                  <p>Wilt u update's krijgen van repair cafe harderwijk? Volg ons op facebook. Wij plaatsen hier updates, events, algemene informatie en meer. En het is altijd welkom om onze posts te delen/like, zodat meer mensen het zien! </p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="box box-services">
                  <h4 class="heading">Facebook</h4>
                  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FRepair-Cafe-Harderwijk-811570042333030%2F&tabs=timeline&width=500&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--   *** INTEGRATIONS END ***-->
    <!-- portfolio-->
    <section id="portfolio" class="background-gray-lightest">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="heading">Portfolio</h1>
            <p class="lead">You can make also a portfolio or image gallery.</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row no-space">
          <div class="col-sm-4 col-xs-12">
            <div class="box"><a href="img/1.jpg" title="" data-lightbox="portfolio" data-title="Portfolio afbeelding 1"><img src="img/1.jpg" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <div class="box"><a href="img/2.jpg" title="" data-lightbox="portfolio" data-title="Portfolio afbeelding 2"><img src="img/2.jpg" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <div class="box"><a href="img/3.jpg" title="" data-lightbox="portfolio" data-title="Portfolio afbeelding 3"><img src="img/3.jpg" alt="" class="img-responsive"></a></div>
          </div>
        </div>
        <div class="row no-space">
          <div class="col-sm-4 col-xs-12">
            <div class="box"><a href="img/4.jpg" title="" data-lightbox="portfolio" data-title="Portfolio afbeelding 4"><img src="img/4.jpg" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <div class="box"><a href="img/5.jpg" title="" data-lightbox="portfolio" data-title="Portfolio afbeelding 5"><img src="img/5.jpg" alt="" class="img-responsive"></a></div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <div class="box"><a href="img/6.jpg" title="" data-lightbox="portfolio" data-title="Portfolio afbeelding 6"><img src="img/6.jpg" alt="" class="img-responsive"></a></div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="lead">Voor meer foto's bezoek onze facebook page!</p>
            <p class="read-more"><a href="#facebook" class="btn btn-ghost">Naar facebook     </a></p>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="footer__block">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h1>Repair Cafe Harderwijk
              <hr>
            </div>
            <div class="col-md-4 col-sm-6">
              <h4 class="heading">Pagina's</h4>
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="category.html">Reparatie</a></li>
                <li><a href="contact.html">contact</a></li>
              </ul>
            </div>
            <div class="col-md-4 col-sm-12">
              <h4 class="heading">Ons adress</h4>
              <p>Zuiderbreedte 15 Harderwijk<br />Gelderland, Nederland<br />E-mail: repaircafeharderwijk@gmail.com</p>
            </div>
            <div class="col-md-4 col-sm-6">
              <h4 class="heading">Social Media</h4>
              <p class="social social--big"><a href="https://www.facebook.com/Repair-Cafe-Harderwijk-811570042333030/" data-animate-hover="pulse" class="external facebook"><i class="fa fa-facebook"></i></a><br />Volg ons op facebook!</p>
            </div>
            <div class="col-lg-12">
              <hr>
            </div>
          </div>
        </div>
      </div>
      <div class="footer__copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>&copy; Repair Cafe 2018</p>
            </div>
            <div class="col-md-6">
              <p class="credit">Code <a href="https://bootstrapious.com/e-commerce-templates" class="external">Bootstrapious</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/front.js"></script>

  </body>

</html>
