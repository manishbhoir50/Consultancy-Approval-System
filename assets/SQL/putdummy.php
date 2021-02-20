<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "internship_approval";
$conn = mysqli_connect($host, $username, $password, $database_name);
$sdrn = array("18CE1009", "18CE1007", "18CE1008");
$first_name = array("shivam", "chetan", "aditya");
$middle_name = array("balaji", "abc", "xyz");
$last_name = array("kendre", "khairnar", "desai");
$dob =  array("2001-01-01", "2001-01-01", "2001-01-01");
$dept = array("computer", "computer", "computer");
$contact = array(1234, 1234, 1234);
$addr = array("abc", "abc", "abc");
$email = array("shivamkendre78@gmail.com", "chetankhairnar28@gmail.com", "adityadesai56@gmail.com");
$doj = array("1/1/2001", "1/1/2001", "1/1/2001");
$qualification = array("computer engineer", "computer engineer", "computer engineer");
$desig = array("front-end", "back-end", "database");
$password = array("1234", "1234", "1234");
$otp = array("123", "123", "123");

for($i = 0 ; $i < 3 ; $i++){
    $query = "INSERT INTO `faculty` VALUES ('$sdrn[$i]', '$first_name[$i]', '$middle_name[$i]', '$last_name[$i]', '$dob[$i]', '$dept[$i]', '$contact[$i]', '$addr[$i]', '$email[$i]', '$doj[$i]', '$qualification[$i]', '$desig[$i]', '$password[$i]', '$otp[$i]')";
   // echo $query;
    $result = mysqli_query($conn, $query);
    if($result)
    echo "success";
    else
    echo mysqli_error($conn);
}

$topic = array("RAIT authentication system", "MU RRC system", "Internship Approval");
$consultancy_type = array("I", "O", "I");
$adress = array("abc", "abc", "abc");
$tentative_amount = array(1000, 5000, 2000);
$abstract = array("../files/18CE1009/sample.pdf", "../files/18CE1009/sample.pdf", "../files/18CE1009/sample.pdf");
$member_count = array(7, 10, 8);
$from_date = array("2001-01-01", "2001-01-01", "2001-01-01");
$to_date =  array("2001-01-01", "2001-01-01", "2001-01-01");
$skills = array("no required", "no required", "no required");
$date_submission = array("2001-01-01", "2001-01-01", "2001-01-01");
$status = array("approved", "approved", "pending");

for($i = 0 ; $i < 3 ; $i++){
    for($j = 0 ; $j < 3; $j++){
        $query = "INSERT INTO `internships` (`Sdrn`, `Topic`, `Consultancy_Type`, `Address`, `Tentative_Amount`, `Abstract`, `Members_Count`, `From_Date`, `To_Date`, `Skills`, `Date_Submission`, `status`) VALUES ('$sdrn[$i]', '$topic[$j]', '$consultancy_type[$j]', '$adress[$j]', '$tentative_amount[$j]', '$abstract[$j]', '$member_count[$j]', '$from_date[$j]', '$to_date[$j]', '$skills[$j]', '$date_submission[$j]', '$status[$j]')";
       // echo $query;
        $result = mysqli_query($conn, $query);
        if($result)
        echo "success";
        else
        echo mysqli_error($conn);
    }
}
?>