<?php
function loginCheck($email, $password){

  $password2 = htmlspecialchars($password);
  $hashedPass = hash("sha256", $password2);

  include ("../includes/connection.php");

  $sql = "SELECT * FROM `customer` WHERE `e-mail` = :email AND `password` = :password";

  $stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $stmt->execute(array(
    ':email'    =>  $email,
    ':password' =>  $hashedPass
  ));

  $result["count"] = $stmt->rowCount();
  $result["info"] = $stmt->fetchALL(PDO::FETCH_ASSOC);
  return $result;

}

function login(){
  
}
