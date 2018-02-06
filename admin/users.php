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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/master.css">

  <!-- Font Awsome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

  <?php
  session_start();
  // php include
  include ("includes/function.php");
  ?>

</head>

<body>
<?php
  if (!isset($_SESSION["login"]["Succesful"])) {
    login();
  }
  var_dump($_POST);

  if (isset($_POST['type'])) {
    switch ($_POST['type']) {
      case 'add':
          if (isset($_POST["employee_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["power"])) {
            addUser($_POST["employee_name"], $_POST["password"], $_POST["email"], $_POST["power"]);
          }
        break;

      case 'edit':
        if (isset($_POST["employee_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["power"]) && isset($_POST["user"])) {
          if ($_POST["password"] != "") {
            updateUserPass($_POST["user"], $_POST["employee_name"], $_POST["password"], $_POST["email"], $_POST["power"]);
          }
          else {
            updateUser($_POST["user"], $_POST["employee_name"], $_POST["email"], $_POST["power"]);
          }
        }
        break;

      case 'delete':
        if (isset($_POST['type'])) {
          deleteUser($_POST["user"]);
        }
        break;

    }
  }
?>
  <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <img src="img/logo.jpg" class="headerImg">
      </div>

      <ul class="list-unstyled components">
        <p>Adminpanel</p>
        <li>
          <a href="index.php">Dashboard</a>
        </li>
        <li>
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Orders</a>
          <ul class="list-dropdown collapse list-unstyled" id="homeSubmenu">
            <li><a href="#">Nieuw</a></li>
            <li><a href="#">Open</a></li>
            <li><a href="#">Afgesloten</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Contact Form</a>
        </li>
        <?php
          if (isset($_SESSION["login"]["power"])) {
            if ($_SESSION["login"]["power"] == 1) {
              echo '
              <li class="active">
                <a href="users.php">Medewerkers</a>
              </li>
              ';
            }
          }
        ?>
      </ul>
      <div class="sidebar-footer" style="bottom: 0;position: absolute;left: 0;height: auto;width: 250px;">
        <div class="container-fluid">
          <div class="row" style="margin-bottom: 15px;">
            <div class="col-lg-12">
              <h4 style="text-align: center;">Welkom:</h4>
              <p style="text-align: center;">Robin Baljeu</p>
            </div>
            <div class="col-lg-6">
              <button class="btn btn-default" style="width: 100%;">Profile</button>
            </div>
            <div class="col-lg-6" style="/*! width: 100%; */">
              <a href="logout.php">
                <button class="btn btn-default" style="width: 100%;">Loguit</button>
              </a>
            </div>
          </div>
        </div>
      </div>
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
            <h2> Medewerkers </h2>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Loguit</a></li>
            </ul> -->
          </div>
        </div>
      </nav>
      <div id="mainContent">
        <div class="container-fluid">
          <div class="row">

            <?php
            if (isset($_GET["user"])) {
              echo '<form action="users.php" method="post">';
              if ($_GET["user"] == 'add') {
                echo '<input type="hidden" name="type" value="add">';
              }
              else {
                $result = getUserInfo($_GET["user"]);
                if ($result["count"] != 1) {
                  $error = '404';
                }
                else {
                  echo '<input type="hidden" name="type" value="edit">';
                  echo '<input type="hidden" name="user" value="'.$_GET["user"].'">';
                }
              }
              if (isset($error)) {
                echo $error;
              }
              else {
                echo '
                <div class="col-lg-8">
                  <div class="container-fluid shadow-box">
                    <div class="title-box'; if ($_GET['user'] == 'add') { echo " teal "; } else { echo " yellow ";} echo '">
                      <p>'; if ($_GET['user'] == 'add') { echo " Medewerker aanmaken: "; } else { echo ' Wijzig '.$result["info"][0]["employee_name"].':';} echo '</p>
                    </div>
                    <div class="form-group">
                      <label for="">Naam:</label>
                      <input type="text" class="form-control" value="'; if ($_GET['user'] != 'add') { echo $result['info'][0]['employee_name']; } echo '" name="employee_name" id="" required placeholder="Voor- en achternaam">
                      <p class="help-block">De voor- en achternaam van de medewerker.</p>
                    </div>
                    <div class="form-group">
                      <label for="">E-mailadres</label>
                      <input type="text" class="form-control" value="'; if ($_GET['user'] != 'add') { echo $result['info'][0]['e-mail']; } echo '" name="email" id="" required placeholder="E-mailadres">
                      <p class="help-block">Het e-mailadres van de medewerker.</p>
                    </div>
                    <div class="form-group">
                      <label for="">Wachtwoord</label>
                      <input type="password" class="form-control" name="password" id="" '; if ($_GET['user'] == 'add') { echo " required "; } echo 'placeholder="Wachtwoord">
                      <p class="help-block">'; if ($_GET['user'] == 'add') { echo "Het wachtwoord voor de medewerker."; } else { echo "Wijzig het wachtwoord van de medewerker. Laat leeg als het wachtwoord niet gewijzigd moet worden.";} echo '</p>
                    </div>
                    <div class="form-group">
                      <label for="">Rechten</label>
                      <select class="form-control" required name="power">
                        <option value="0">Gebruiker</option>
                        <option '; ; if ($_GET['user'] != 'add') { if ($result["info"][0]["power"] == 1) { echo "selected "; } } echo 'value="1">Admin</option>
                      </select>
                      <p class="help-block">De rechten van de gebruiker.</p>
                    </div>
                    <div class="form-group">
                      <button type="input" name="formSubmit" value="true" class="btn btn-secondary btn-lg">'; if ($_GET['user'] == 'add') { echo " Aanmaken "; } else { echo " Aanpassen ";} echo '</button>
                    </div>
                  </div>
                </div>

                </form>

                <div class="addUser">
                  <a href="users.php"><button type="button" class="btn btn-default btn-lg"><i class="fas fa-arrow-circle-left"></i> Ga terug</button></a>
                </div>
                ';

                if ($_GET['user'] != 'add') {
                  echo '
                  <div class="col-lg-4">
                    <div class="container-fluid shadow-box">
                      <div class="title-box red">
                        <p>Verwijderen</p>
                      </div>

                      <p> Wilt u deze user zeker weten verwijderen? </p>
                      <form action="users.php" method="post" class="">
                        <div class="form-group">
                          <input type="hidden" name="user" value="'.$_GET["user"].'">
                          <button type="input" name="type" value="delete" class="btn btn-secondary btn-lg btn-block">Verwijderen</button>
                        </div>
                      </form>

                    </div>
                  </div>
                  ';
                }
              }
            }
            else {
              echo '
              <div class="col-lg-12">
                <div class="container-fluid shadow-box">
                  <div class="title-box teal">
                    <p>Medewerkers</p>
                  </div>
                  <table id="userTable" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Naam:</th>
                        <th>E-mailadres:</th>
                        <th>Admin:</th>
                        <th>Mogelijkheden:</th>
                      </tr>
                    </thead>
                    <tbody>
                    ';
                    $results = getUsers();
                    $number = 1;
                    foreach ($results as $user) {
                      echo '
                        <tr>
                          <td>'.$number.'</td>
                          <td>'.$user["employee_name"].'</td>
                          <td>'.$user["e-mail"].'</td>
                          <td>'; if ($user["power"] == 1) {
                            echo '<i class="fas fa-check correct">';
                          }
                          else {
                            echo '<i class="fas fa-times"></i>';
                          } echo '</td>
                          <td><a href="users.php?user='.$user["employee_id"].'"><i class="fas fa-pencil-alt"></i> / <i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                      ';
                      $number++;
                    }
                    echo '
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="addUser">
                <a href="users.php?user=add"><button type="button" class="btn btn-success btn-lg"><i class="fas fa-plus"></i> Gebruiker toevoegen</button></a>
              </div>
              ';
            }

            ?>

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
