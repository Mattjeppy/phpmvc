<?php
require('../database/db.php');
require('../model/schools.php');
require('../model/member.php');

$schools = getSchoolNames($db);


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $name = $_POST['name'];
    $school  = $_POST['school'];

    $errors = validateForm($email, $name);

    if (empty($errors)) {
        echo 'here';
        add_member($db, $name, $email, $school);
        header('Location: schools.php');
    }
}
require('../view/member.php');
?>