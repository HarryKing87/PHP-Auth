<?php 
session_start();

class Users extends SQLite3 {
    function __construct() {
        $this->open("credentials.db");
    }
}

$db = new Users();

if (!$db) {
    echo $db->lastErrorMsg();
} else {
    echo "Database created successfully.\n";
}


$sql = "SELECT * FROM users";

$result = $db->query($sql);

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "USERNAME = ". $row['USERNAME'] ."\n";
    echo "MAIL = ". $row['MAIL'] ."\n";
    echo "PASSWORD = " . $row['PASSWORD'] ."\n";
}
echo "Database records have been shown\n";
$db->close();
?>