<?php


include('connection.php');


// this method will destroy the session
function log_out()
{
    session_destroy();
?>
    <script>
        window.location.replace("./index.php");
    </script>
    <?php
}

// method to getting intership details like - all pending required completed rejected
// required - all pending completed rejected
// role - faculty hod principle din
// sdrn - sdrn of faculty
// dept - computer ertc extc instrumentation IT

function load_details($required, $role, $sdrn, $dept)
{

    global $conn;

    // query for faculty module
    if ($role == "faculty") {
        if ($required == "all")
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` = '$sdrn'";
        else
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` = '$sdrn' AND `status` = '$required'";
    }


    // use else if and write query for your module rest all part will be same

    // this part is going to be same for all module
    $result = mysqli_query($conn, $query);
    return $result;
}



// function for Displaying Faculty Details
function display_details()
{

    include("../assets/php_modules/connection.php");
    global $conn;

    $sdrn = $_SESSION['sdrn'];

    $query = "SELECT * FROM `faculty` WHERE `Sdrn` = '$sdrn'";
    $result = mysqli_query($conn, $query);
    $faculty = mysqli_fetch_assoc($result);
    return $faculty;
}

//function to load date of submission
function display_date()
{
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    return $date;
}

//function to upload file in Faculty directory
function upload_file($sdrn)
{
    $dirname = $sdrn;
    $filename = "../files/" . $dirname . "/";

    if (!file_exists($filename)) {
        mkdir("../files/" . $dirname, 0777);
    }
    $name = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $filename = "../files/" . $dirname . "/" . $name;
    move_uploaded_file($tmp, $filename);
    $filename = "../files/" . $dirname . "/" . $name; // format to send code to database
    return $filename;
}

//function to upload internship details in Internships directory
function upload_details($sdrn, $topic, $consultancy, $company_name, $amount, $path, $count, $startdate, $enddate, $skill, $submission_date)
{
    global $conn;

    $query = "INSERT INTO `internships` (`Sdrn`, `Topic`, `Consultancy_Type`,`Company_Name`, `Address`, `Tentative_Amount`, `Abstract`, `Members_Count`, `From_Date`, `To_Date`, `Skills`, `Date_Submission`, `status`) VALUES ('$sdrn','$topic','$consultancy','$company_name','abc','$amount','$path','$count','$startdate','$enddate','$skill','$submission_date','pending') ";

    mysqli_query($conn, $query);

    $queryi = "SELECT MAX(`internship_id`) AS MAXIMUM FROM `internships`";
    $data = mysqli_query($conn, $queryi);
    $res = mysqli_fetch_assoc($data);
    $id =  $res['MAXIMUM'];
    ?>
       <script>
           window.location.href = "view_form.php?internship_id=<?php echo $id ?>"
       </script>
    <?php
}
?>
