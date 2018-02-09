<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 31-1-2018
 * Time: 09:02
 */

// Get orders for het dashboard
function getOrders(){

  include ("includes/connection.php");

  $sql = "SELECT * FROM  repair_order INNER JOIN customer ON repair_order.customer_id=customer.customer_id INNER JOIN product ON repair_order.product_id=product.product_id";

  $stmt = $db->prepare($sql);
  $stmt->execute();

  $result = $stmt->fetchALL();
  return $result;

}

// Add new user
function addUser($employee_name, $password, $email, $power){

  $password2 = htmlspecialchars($password);
  $hashedPass = hash("sha256", $password2);

  include ("includes/connection.php");

  $sql = "INSERT INTO `employee` (`employee_id`, `employee_name`, `password`, `e-mail`, `power`) VALUES (NULL, :employee_name, :password, :email, :powers);";

  $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array(
    ':employee_name'  =>  $employee_name,
    ':password'       =>  $hashedPass,
    ':email'          =>  $email,
    ':powers'         =>  $power
  ));

}

// Check if a user already exists
function checkUser($email){

  include ("includes/connection.php");

  $sql = "SELECT * FROM `employee` WHERE `e-mail` = :email";

  $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array(
    ':email' => $email
  ));

  $result = $stmt->fetchALL();
  return $result;

}

// Gebruikers wijzigen With password
function updateUserPass($id, $employee_name, $password, $email, $power) {

  $password2 = htmlspecialchars($password);
  $hashedPass = hash("sha256", $password2);

  include ("includes/connection.php");

  $sql = "UPDATE `employee` SET `employee_name`=:name,`password`=:password,`e-mail`=:email,`power`=:powers WHERE `employee_id` = :id";

  $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array(
    ':id'       =>  $id,
    ':name'     =>  $employee_name,
    ':password' =>  $hashedPass,
    ':email'    =>  $email,
    ':powers'   =>  $power
  ));

}

// Gebruikers wijzigen Without password
function updateUser($id, $employee_name, $email, $power) {

  include ("includes/connection.php");

  $sql = "UPDATE `employee` SET `employee_name`=:name,`e-mail`=:email,`power`=:powers WHERE `employee_id` = :id";

  $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array(
    ':id'       =>  $id,
    ':name'     =>  $employee_name,
    ':email'    =>  $email,
    ':powers'   =>  $power
  ));

}

// Gebruiker verwijderen
function deleteUser($id) {

  include ("includes/connection.php");

  $sql = "DELETE FROM `employee` WHERE `employee_id` = :id";

  $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array(
    ':id' => $id
  ));

}

// Get user for editing
function getUsers(){

  include ("includes/connection.php");

  $sql = "SELECT * FROM `employee`";

  $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute();

  $result = $stmt->fetchALL();
  return $result;

}

// Get user for editing
function getUserInfo($employee_id){

  include ("includes/connection.php");

  $sql = "SELECT * FROM `employee` WHERE `employee_id` = :employee_id";

  $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array(
    ':employee_id' => $employee_id
  ));

  $result["count"] = $stmt->rowCount();
  $result["info"] = $stmt->fetchALL();
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

function updateOrderInfo($order_id, $status, $category, $employee, $info) {
    include ("includes/connection.php");

    $sql = "UPDATE repair_order SET status = :status, category = :category, employee_name = :employee, info = :info WHERE order_id = :order_id";

    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ':order_id' => $order_id,
        ':category' => $category,
        ':employee' => $employee,
        ':status' => $status,
        ':info' => $info
    ));
}

function getMaterials($order_id) {

    include ("includes/connection.php");

    $sql = "SELECT * FROM material WHERE order_id = :order_id";

    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ':order_id' => $order_id
    ));

    $result = $stmt->fetchALL();
    return $result;
}

function getCosts($materialItems){
    include ("includes/connection.php");

    $sql = "UPDATE repair_order SET status = :status, costs = :costs, category = :category, employee_name = :employee WHERE order_id = :order_id";

    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ':order_id' => $order_id
    ));
}

function addMaterial($order_id, $material, $amount, $cost){

    include ("includes/connection.php");

    $sql = "INSERT INTO material (material_name, amount, price, order_id)
            VALUES (:material, :amount, :cost, :order_id)";

    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ':order_id' => $order_id,
        ':material' => $material,
        ':amount' => $amount,
        ':cost' => $cost
    ));
}

function deleteMaterial($material_id){

    include ("includes/connection.php");

    $sql = "DELETE FROM material WHERE material_id = :material_id";

    $stmt = $db->prepare($sql);
    $stmt->execute(array(
        ':material_id' => $material_id
    ));
}

// Login Function
function logIn(){
  $message = "";
  $login = '
  <div id="login-content">
    <div class="container-fluid">
      <div id="login" class="title-box blue">
        <p><i class="fas fa-user-circle"></i> Login</p>
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
