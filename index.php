<?php


require('database/db.php');

switch ($_SERVER['REQUEST_URI']) {
    case '/member':
        require('controller/member.php');
        break;
    case '/school' && isset($_GET['id']):
        require('controller/schools.php');
        break;
    default:
        require('controller/schools.php');
}