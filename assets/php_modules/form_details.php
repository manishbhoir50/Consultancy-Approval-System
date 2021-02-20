<?php

// function for viewing form
function get_form_details($internship_id){


    include("../assets/php_modules/connection.php");

    global $conn;

    // query to fetch internship details
    $query = "SELECT * FROM `internships` WHERE `internship_id` = '$internship_id'";
    $result = mysqli_query($conn, $query);
    $form = mysqli_fetch_assoc($result);
    return $form;
}

function get_faculty_details($sdrn){

    global $conn; 

    // query to fetch faculty details
    $query = "SELECT * FROM `faculty` WHERE `Sdrn` = '$sdrn'";
    $result = mysqli_query($conn, $query);
    $faculty = mysqli_fetch_assoc($result);
    return $faculty;
}
