<?php
$servername = "toucan.cxso3ondsosa.eu-west-2.rds.amazonaws.com";
$username = "admin";
$password = "toucantech1234";
$database = "toucan";

$db = new mysqli($servername, $username, $password, $database);

if ($db->connect_error) {
    echo 'Connection error: ' . $db->connect_error;
} else {
    echo 'Connection success!';
}
// connect on cli
// mysql -h toucan.cxso3ondsosa.eu-west-2.rds.amazonaws.com -u admin -p
