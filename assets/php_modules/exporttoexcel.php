<?php
include_once("connection.php");
include_once("common_methods.php");
error_reporting(0);
session_start();

//code to covert table into excel
$result=load_details($_SESSION['current_status'],$_SESSION['role'],$_SESSION['sdrn'],$_SESSION['dept'],$_SESSION['start_date'],$_SESSION['end_date']);
if(mysqli_num_rows($result)!=0){
    $html='<table border="1"><tr><tr><th>INTERNSHIP ID</th><th>TOPIC</th><th>FACULTY</th><th>STATUS</th><th>DATE</th></tr></tr>';
    while($data=mysqli_fetch_assoc($result)){
     $queryfunction= "SELECT `First_name`,`Last_name` FROM `faculty` WHERE Sdrn In (SELECT `Sdrn` FROM `internships` WHERE `internship_id` = '$data[internship_id]' AND `Topic` = '$data[Topic]' )";
     $output = mysqli_query($conn,$queryfunction);
     $output = mysqli_fetch_assoc($output);
    
     $html.='<tr><td>'.$data['internship_id'].'</td><td>'.$data['Topic'].'</td><td>'.$output['First_name'].' '.$output['Last_name'].'</td><td>'.$data['status'].'</td><td>'.$data['Date_submission'].'</td></tr>';
    }
    $html.='</table>';
    }
else{
    $html="Oops no Internship Found";
}

    header('Content-Type: application/force-download');
    header('Content-Disposition: attachment;  filename=InternshipReport'.date("d-m-Y").'.xls'); 

echo $html;
?>
