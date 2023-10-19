<?php
require('../database/db.php');
require('../model/schools.php');

$schools = getSchoolNames($db);

require('../view/schools.php');

if (isset($_POST['submit'])) {
    $id = $_POST['school'];
    $members = get_members_for_school($db, $id);

    if (empty($members)) {
        echo "No members found for the selected school.";
    } else {
        echo "<h4>Members for the selected school:</h4>";
        echo "<ul>";
        foreach ($members as $member) {
            echo "<li>Name: " . $member['name'] . ", Email: " . $member['email'] . "</li>";
        }
        echo "</ul>";
    }
}
