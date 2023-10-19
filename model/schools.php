<?php

function getSchoolNames($db) {
    $sql = 'SELECT name FROM school;';
    $result = mysqli_query($db, $sql);
    $schools = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $schools;
}


function get_members_for_school($db, $schoolId) {
    $members = array();
    $sql = 'SELECT members.* FROM members, member_school WHERE members.id = member_school.memberid AND member_school.schoolid = ?';
    $statement = $db->prepare($sql);

    if ($statement) {
        $statement->bind_param("i", $schoolId);
        $statement->execute();

        $result = $statement->get_result();

        while ($row = $result->fetch_assoc()) {
            $members[] = $row;
        }

        $statement->close(); 
    } else {
        echo 'Error preparing SQL statement: ' . $db->error;
    }

    return $members;
}