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
              <li><a href="index.php">Home</a></li>
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
              <li class="active"><a href="contact.php">Contact</a></li>
            </ul><a href="#" data-toggle="modal" data-target="#login-modal" class="btn navbar-btn btn-ghost"><i class="fa fa-sign-in"></i>Log in</a>
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

    <section class="background-gray-lightest">
      <div class="container">
        <div class="breadcrumbs">
          <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>Contact</li>
          </ul>
        </div>
        <h1 class="heading">Contact</h1>
        <p class="lead">Zijn er nog vragen, of is er iets onduidelijk neem contact met ons op! </p>
      </div>
    </section>
    <section>
      <div id="contact" class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="icon"><i class="pe-7s-pen"></i></div>
            <h4 class="heading margin-bottom">contact formulier</h4>
            <form>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="firstname">Voornaam</label>
                    <input id="firstname" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="lastname">Achternaam</label>
                    <input id="lastname" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="email">E-mailadres</label>
                    <input id="email" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="subject">onderwerp</label>
                    <input id="subject" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="message">Bericht</label>
                    <textarea id="message" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Verstuur bericht</button>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-4">
            <div class="box-simple">
              <div class="icon"><i class="pe-7s-map-2"></i></div>
              <h4 class="heading margin-bottom">Adres</h4>
              <p>Zuiderbreedte 15 Harderwijk<br />Gelderland, Nederland<br />E-mail: repaircafeharderwijk@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <!-- to use it on your site, generate your own API key for Google Maps and paste it above -->

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
                <li><a href="category.html">Support</a></li>
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
