<?php
class Users extends SQLite3 {
    function __construct() {
        $this->open("credentials.db");
    }
}
$database = new Users();
if (!$database) {
    echo $database->lastErrorMsg();
} else {
    echo "<span>Database opened successfully!</span>\n";
}


$sqlCommand = "INSERT INTO users (USERNAME,MAIL,PASSWORD) 
                VALUES ('".$_POST['username']."', '".$_POST['mail']."', '".$_POST['password']."');";


$result = $database->exec($sqlCommand);

if (!$result) {
    echo $database->lastErrorMsg();
} else {
    echo "<span>Registered successfully!</span>\n";
}

$database->close();


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Smooch+Sans:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="CSS/register.css">
<title>Register | PHP Auth</title>
</head>
<body>
<div class="container">
<form method="post" action="">
<h1 style="margin-left: auto; margin-right:auto; margin-top: -5%; margin-bottom:1rem; font-family: 'Smooch Sans', sans-serif; color:white;text-align:center;">Register</h1>
<label for="username">Username</label>
<input type="text" name="username" id="username">
<label for="mail">E-mail</label>
<input type="email" name="mail" id="mail">
<label for="password">Password</label>
<input type="password" name="password">
<button type="submit" id="submitButton">Submit</button>
</form>
</div>
<div class="navigation">
  <button><a href="login.php">Login</a></button>
  <button><a href="register.php">Register</a></button>
</div>
</body>
</html>