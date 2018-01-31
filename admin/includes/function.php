<?php
/**
 * Created by PhpStorm.
 * User: tim11
 * Date: 31-1-2018
 * Time: 09:02
 */

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
        $query = "SELECT * FROM login WHERE email = :email AND password = :password";
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
          $_SESSION["login"]["email"]       =   $result[0]["email"];
          $_SESSION["login"]["name"]        =   $result[0]["name"];
          $_SESSION["login"]["Succesful"]   =   true;
          $_SESSION["login"]["power"]       =   $result[0]["rechten"];
          $_SESSION["login"]["userID"]      =   $result[0]["userID"];
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
