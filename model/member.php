<?php

function add_member($db, $name, $email, $school) {
    $stmt = $db->prepare('SELECT id FROM school WHERE name = ?');
    $stmt->bind_param("s", $school);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $schoolId = $row['id'];
        $stmt->close();

        $insertMember = $db->prepare('INSERT into members (name, email) values (?, ?)');
        $insertMember->bind_param("ss", $name, $email);

        if ($insertMember->execute()) {
            $memberId = $db->insert_id;

            $insertMemberSchool = $db->prepare('INSERT into member_school (memberid, schoolid) values (?, ?)');
            $insertMemberSchool->bind_param("ii", $memberId, $schoolId);

            if (!$insertMemberSchool->execute()) {
                echo 'Error inserting into member_school: ' . $insertMemberSchool->error;
            }
        } else {
            echo 'Error executing member insertion: ' . $insertMember->error;
        }
    } else {
        echo 'School not found';
    }
}


function validateForm($email, $name) {
    $errors = array();

    if (empty($email)) {
        $errors['email'] = 'An email is required <br />';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email must be a valid email address <br />';
    }

    if (empty($name)) {
        $errors['name'] = 'A name is required <br />';
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $errors['name'] = 'Name must be letters and spaces only <br />';
    }
    return $errors;
}