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
//  if (!isset($_SESSION["login"]["Succesful"])) {
//    login();
//  }
?>
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
        <li>
          <a href="#">Contact Form</a>
        </li>
        <li>
          <a href="users.php">Medewerkers</a>
        </li>
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
              <li><a href="#">Loguit</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div id="mainContent">
        <div class="container-fluid">
          <div class="row">

              <?php
              if (!isset($_GET['order'])) {
                echo '
                <div class="col-lg-8">
                  <div class="container-fluid shadow-box">
                    <div class="title-box blue">
                      <p>Orders</p>
                    </div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Klant naam:</th>
                          <th>Product</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      ';
                      $orders = getOrders();
                      foreach ($orders as $order) {
                      echo '
                        <tr>
                          <td>' . $order['customer_name'] . '</td>
                          <td>' . $order['product_name'] . '</td>
                          <td>' . $order['status'] . '</td>
                          <td>
                            <a href="index.php?order=' . $order['order_id'] . '">
                              <span class="glyphicon glyphicon-play"></span>
                            </a>
                          </td>
                        </tr>
                      ';
                      }
                      echo '
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
                ';
              }
              elseif (isset($_GET['order'])) {
              $currentOrder = getOrderInfo($_GET['order']);
              $productInfo = getProductInfo($currentOrder[0]['product_id']);
                echo '
                  <div class="col-lg-8">
                    <div class="container-fluid shadow-box">
                      <div class="title-box blue">
                        <p>Klant: ' . $currentOrder[0]['customer_name'] .' <span style="margin-left:50px">Product: '. $productInfo[0]['product_name'] .'</span></p>
                      </div>
                      ';
                      foreach ($productInfo as $order){
                        echo '
                        <div class="col-lg-6">
                          <p1>Probleem van de klant: <br> '. $order['info_problem'] .'</p1>
                        </div>
                        <div class="col-lg-6">
                          <img src="http://via.placeholder.com/300x250">
                        </div>
                        <div class="col-lg-12">
                          <p1>Wat de klant al heeft geprobeerd: <br> '. $order['info_tried'] .'<br></p1>
                        </div>   
                        ';
                      }

                    echo '
                    </div>
                  </div>
                  
                  <div class="col-lg-4">
                  <div class="container-fluid shadow-box">
                      <div class="title-box blue">
                        <p>Order info</p>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                        <form name="order_info" method="post">
                          <p1>Order status: </p1>
                          <select name="order_status" title="order_status">
                            <option value="open">Open</option>
                            <option value="inprogress">In progress</option>
                            <option value="done">Done</option>
                          </select>
                              <table title="Materiaal gebruikt" class="table inputInfo">
                                <thead>
                                    <tr>
                                        <td>Materiaal</td>
                                        <td>Hoeveelheid</td>
                                        <td>Prijs per stuk</td>
                                        <td>Toevoegen/verwijderen</td>
                                    </tr>
                                    ';
                                    foreach (getMaterials($_GET['order']) as $material) {
                                        echo '
                                            <tr>
                                                <td>'.$material['material_name'].'</td>
                                                <td>'.$material['amount'].'</td>
                                                <td>'.$material['price'].'</td>
                                                <td><button name="delete"><i class="fas fa-trash-alt"></i></button></td>
                                                <input type="hidden" name="material_id" value="'.$material['material_id'].'">
                                            </tr>
                                        ';
                                    }
                  echo'
                                        <tr>
                                            <td><input type="text" name="material"></td>
                                            <td><input type="number" name="amount"></td>
                                            <td><input type="number" step=".01" name="cost"></td>
                                            <td><button name="material_add"><i class="fas fa-plus"></i></button></td>
                                        </tr>
                                </thead>
                              </table>
                          <p1>Taak toewijzen aan: 
                          <select name="order_employee" title="Assigned to">
                          <option value="none">Open</option>
                          ';
                            $users = getUsers();
                            foreach($users as $user){
                                echo'
                                    <option value="open">'. $user["employee_name"] .'</option>
                                ';
                            }
                            echo '
                          </select>
                          <br>Probleem categorie: </p1>
                          <select>
                            <option value="software">software</option>
                            <option value="hardware">hardware</option>
                          </select>
                         <br>Eventueel extra informatie: </p1>
                          <textarea style=" width: 100% "></textarea>
                         </div>
                         <div class="col-lg-12">
                          <button type="submit" name="cancel" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</button> <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-check"></i> Confirm</button>
                         </form>
                  ';
                  if(isset($_POST['material_add'])){
                      if(!empty($_POST['material'] && $_POST['amount'] && $_POST['cost'])){
                          addMaterial($_GET['order'], $_POST['material'], $_POST['amount'], $_POST['cost']);
                          echo "<meta http-equiv='refresh' content='0'>";
                      }
                  }
                  if(isset($_POST['delete'])){
                      if(isset($_POST['material_id'])){
                          deleteMaterial($_POST['material_id']);
                          echo "<meta http-equiv='refresh' content='0'>";
                      }
                  }
                  if (isset($_POST['submit'])){

                  }
                         echo'
                         </div>
                     </div>
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
