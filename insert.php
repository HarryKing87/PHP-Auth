<?php 

class Users extends SQLite3 {
    function __construct() {
        $this->open("credentials.db");
    }
}

$db = new Users();

if(!$db) {
    echo $db->lastErrorMsg();
} else {
    echo "Database OK!";
}

$sql = "CREATE TABLE users (USERNAME VARCHAR(255) NOT NULL,MAIL VARCHAR(255) NOT NULL,PASSWORD VARCHAR(255) NOT NULL);";

$res = $db->exec($sql);

if(!$res) {
    echo $db->error();
} else {
    echo "Insert OK!";
}
?>