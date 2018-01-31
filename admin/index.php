<!-- Start HTML -->
<!DOCTYPE html>
<html lang="nl">
<head>

  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name='author' content='name, email@hotmail.com'>
  <meta name="description" content=" ">
  <meta name="keywords" content="words">
  <meta name='subject' content='your websites subject'>

  <!-- Website Titel -->
  <title>Repair Cafe Harderwijk</title>

  <!-- Stylesheets + Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/master.css">

  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

</head>

<body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="http://via.placeholder.com/250x150">
                </div>

                <ul class="list-unstyled components">
                    <p>Adminpanel</p>
                    <li class="active">
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Orders</a>
                        <ul class="list-dropdown collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Nieuw</a></li>
                            <li><a href="#">Open</a></li>
                            <li><a href="#">Afgesloten</a></li>
                        </ul>
                    </li>
<!--                    <li>-->
<!--                        <a href="#">Contact Form</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Gebruikers</a>-->
<!--                    </li>-->
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">
              <nav class="navbar navbar-default">
                  <div class="container-fluid">

                      <div class="navbar-header">
                          <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                              <i class="glyphicon glyphicon-align-left"></i>
                              <span>Toggle Sidebar</span>
                          </button>
                          <h2> Dashboard </h2>
                      </div>

                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav navbar-right">
                              <!-- <li><a href="#">Page</a></li> -->
                          </ul>
                      </div>
                  </div>
              </nav>
              <div id="mainContent">
                <div class="container-fluid">
                  <div class="row">

                    <div class="col-lg-8">
                      <div class="container-fluid shadow-box">
                        <div class="title-box blue">
                          <p>Orders</p>
                        </div>
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Name:</th>
                              <th>Lastname</th>
                              <th>Age</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Robin Baljeu</td>
                              <td>Smith</td>
                              <td>50</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="container-fluid shadow-box">
                        <div class="title-box red">
                          <p>Activiteiten</p>
                        </div>
                        Hier komen de gebruikers
                      </div>
                    </div>

                    <div class="col-lg-8">
                      <div class="container-fluid shadow-box">
                        <div class="title-box blue">
                          <p>Orders</p>
                        </div>
                        Hier Komen de orders
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
        </div>





        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>
    </body>
</html>
