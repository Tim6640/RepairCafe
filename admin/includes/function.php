<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 31-1-2018
 * Time: 09:02
 */

// Get orders voor het dashboard
function getOrders(){

  include ("includes/connection.php");

  $sql = "SELECT * FROM  repair_order INNER JOIN customer ON repair_order.customer_id=customer.customer_id INNER JOIN product ON repair_order.product_id=product.product_id";

  $stmt = $db->prepare($sql);
  $stmt->execute();

  $result = $stmt->fetchALL();
  return $result;

}

// Get the order that has been selected
function getOrderInfo($order_id) {

  include ("includes/connection.php");

  $sql = "SELECT * FROM repair_order INNER JOIN customer ON repair_order.customer_id=customer.customer_id WHERE order_id = :order_id";

  $stmt = $db->prepare($sql);
  $stmt->execute(array(
    ':order_id' => $order_id
  ));

  $result = $stmt->fetchALL();
  return $result;
}

function getProductInfo($product_id) {

    include ("includes/connection.php");

    $sql = "SELECT * FROM product WHERE product_id = :product_id";

    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ':product_id' => $product_id
    ));

    $result = $stmt->fetchALL();
    return $result;
}

// Login Function
function logIn(){
  $message = "";
  $login = '
  <div id="login-content">
    <div class="container-fluid">
      <div id="login" class="title-box blue">
        <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> Login</p>
      </div>
      <div class="row">
        <div class="col-lg-12 loginHeader">
          <h2>Adminpanel</h2>
          <small>Repair cafe harderwijk</small>
        </div>
        <form class="loginForm" action="" method="post">
        <div class="col-lg-12">
          <div class="form-group">
            <label>Gebruikersnaam</label>
            <input type="text" class="form-control" name="loginUsername" required placeholder="Gebruikersnaam">
            <small class="form-text text-muted">Voer uw gebruikersnaam in.</small>
          </div>
          <div class="form-group">
            <label>Wachtwoord</label>
            <input type="password" class="form-control" name="loginPassword" required placeholder="Wachtwoord">
            <small class="form-text text-muted">Voer uw wachtwoord in.</small>
          </div>
        </div>
        <div class="col-lg-12">
          <input type="submit" class="btn btn-default" name="loginSubmit" value="login">
        </div>
        </form>
      </div>
    </div>
  </div>
  </body>
  </html>
  ';
  if (isset($_POST["loginSubmit"])) {
    try
    {
      // Connect to database and Check
      include 'connection.php';
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if(empty($_POST["loginUsername"]) || empty($_POST["loginPassword"])) {
        $message = 'Alle Velden zijn verplicht!';
      }
      else{
        $password = htmlspecialchars($_POST["loginPassword"]);
        $hashedPass = hash("sha256", $password);
        $query = "SELECT * FROM employee WHERE `e-mail` = :email AND password = :password";
        $statement = $db->prepare($query);
        $statement->execute(
          array(
            ':email'     =>     $_POST["loginUsername"],
            ':password'     =>     $hashedPass
          )
        );
        $count = $statement->rowCount();
        if($count > 0)
        {
          $result = $statement->fetchALL();
          $_SESSION["login"]["email"]       =   $result[0]["e-mail"];
          $_SESSION["login"]["name"]        =   $result[0]["employee_name"];
          $_SESSION["login"]["Succesful"]   =   true;
          $_SESSION["login"]["power"]       =   $result[0]["power"];
          $_SESSION["login"]["userID"]      =   $result[0]["employee_id"];
        }
        else
        {
          $message = 'Verkeerde gegevens!';
        }
      }
    } // End Try
    catch(PDOException $error)
    {
      $message = $error->getMessage();
    }
  }
  else {
    echo $message;
    echo $login;
    exit;
  }

  if (!empty($message)) {
    echo $message;
    echo $login;
    exit;
  }
}
