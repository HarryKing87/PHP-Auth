<?php 
session_start();
class Users extends SQLite3
   {
      function __construct()
      {
         $this->open('credentials.db');
      }
   }
   $db = new Users();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      //echo "Opened database successfully\n";
   }

   $sql ='SELECT * from USERS where USERNAME="'.$_POST["username"].'";';


   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      $username=$row["USERNAME"];
      $password=$row['PASSWORD'];
  }
    if ($id!=""){
        if ($password==$_POST["password"]){
           $_SESSION["login"]=$username;
           //header('Location: index.php');   
           if ($_POST["username"] == $username) {
             echo "USERNAME OK!";
           }
        }else{
          
          echo "Wrong Password";
        }
      }else{
       echo "";
      }
   //echo "Operation done successfully\n";
   $db->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | PHP Auth</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Smooch+Sans:wght@500&display=swap" rel="stylesheet">
<style>
   body {
        background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
    }
  h5 {
    color: red;
    text-align: center;
  }
  h1 {
    font-family: 'Smooch Sans', sans-serif;
  }
  .container {
    display: flex;
    flex-direction: column;
    border:2px solid black;
    margin:2rem auto;
    padding:10%;
    max-width:50%;
    border-radius:10px;
    background: rgba(255, 255, 255, 0.2);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
border: 1px solid rgba(255, 255, 255, 0.3);
  }
  form {
    margin:0.75rem auto;
  }

  input {
    margin:1rem auto;
  }
  .navigation {
    display:flex;
    justify-content:center;
    margin-top:2rem;
  }
  .navigation button {
    margin:0 1rem;
  }
  button[type="submit"] {
    width:80px;
    font-weight:700;
    margin:0 auto;
    display:flex;
    text-align:center;
    justify-content:center;
  }
</style>
</head>
<body>

<div class="container">
  <form role="form" action="" method="post">
  <h1 style="margin-left: auto; margin-right:auto; margin-top: -5%; margin-bottom:1rem; font-family: 'Smooch Sans', sans-serif; color:white;">Login</h1>
    <div>
      <label for="username">Username:</label>
      <input type="text" id="username" placeholder="Enter Username" name="username">
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" id="password" placeholder="Enter password" name="password">
    </div>   
    <button type="submit">Submit</button>
  </form>
</div>

<p><?php
  if($username == $_POST["username"] && $_POST["password"] == $password) {
    require("complete.php");
  } 
  else {
    echo "<h5>
    Unsuccessfull Login!
    </h5>";
  }
?></p>

<div class="navigation">
  <button><a href="login.php">Login</a></button>
  <button><a href="register.php">Register</a></button>
</div>
</body>
</html>