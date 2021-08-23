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

function get_document_details($id){

    global $conn; 

    // query to fetch document uploaded details
    $query = "SELECT * FROM `documents` WHERE `internship_id` = '$id'";
    $result = mysqli_query($conn, $query);
    $document = mysqli_fetch_assoc($result);
    return $document;
}

function upload_acceptance($sdrn,$internship_id)
{
  
    $dirname = $sdrn;
    $filename = "../files/" . $dirname . "/" ;

    if (!file_exists($filename)) {

        mkdir($filename, 0777);
    }
    $filename = "../files/" . $dirname . "/" .$internship_id. "/";
    if (!file_exists($filename)) {

        mkdir($filename, 0777);
    }
    $name = $_FILES['acceptance']['name'];
    $tmp = $_FILES['acceptance']['tmp_name'];
    $filename = "../files/" . $dirname . "/". $internship_id."/" . $name;
    move_uploaded_file($tmp, $filename);
    $filename = "../files/" . $dirname . "/" .$internship_id. "/" . $name; // format to send code to database

    // echo $filename;

    return $filename;
}

function upload_payment($sdrn,$internship_id)
{ 
    $dirname = $sdrn;
    $filename = "../files/" . $dirname . "/" ;

    if (!file_exists($filename)) {

        mkdir($filename, 0777);
    }
    $filename = "../files/" . $dirname . "/" .$internship_id. "/";
    if (!file_exists($filename)) {

        mkdir($filename, 0777);
    }
    $name = $_FILES['payment']['name'];
    $tmp = $_FILES['payment']['tmp_name'];
    $filename = "../files/" . $dirname . "/". $internship_id."/" . $name;
    move_uploaded_file($tmp, $filename);
    $filename = "../files/" . $dirname . "/" .$internship_id. "/" . $name; // format to send code to database

    return $filename;
}

function send_documents($internship_id,$path1,$path2){
    global $conn;
    $query = "INSERT INTO `documents` VALUES ( '$path1','$path2','$internship_id') ";
    mysqli_query($conn, $query);
}

?>

