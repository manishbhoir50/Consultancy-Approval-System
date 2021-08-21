<?php


include_once('connection.php');


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

function load_details($required, $role, $sdrn, $dept, $start_date, $end_date)
{

    global $conn;

    // query for faculty module
    if ($role == "faculty") {
        if ($required == "all")
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` = '$sdrn' AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' ORDER BY `Date_submission` DESC, `internship_id` DESC";
        else if ($required == "pending") {
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` = '$sdrn' AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `status` IN ('pending', 'approved by hod', 'approved by dean') ORDER BY `Date_submission` DESC, `internship_id` DESC";
        } else if ($required == "rejected") {
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` = '$sdrn' AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `status` IN ('rejected by dean', 'rejected by hod', 'rejected by principal') ORDER BY `Date_submission` DESC, `internship_id` DESC";
        } else
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` = '$sdrn' AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `status` = '$required' ORDER BY `Date_submission` DESC, `internship_id` DESC";
    } else if ($role == "hod") {
        if ($required == "all")
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' ORDER BY `Date_submission` DESC, `internship_id` DESC";
        else if ($required == "pending")
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `status` IN ('pending', 'approved by hod', 'approved by dean')  ORDER BY `Date_submission` DESC, `internship_id` DESC";
        else if ($required == "rejected") {
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `status` IN ('rejected by dean', 'rejected by hod', 'rejected by principal') ORDER BY `Date_submission` DESC, `internship_id` DESC";
        } else
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `status` = '$required'  ORDER BY `Date_submission` DESC, `internship_id` DESC";
    } else if ($role == "Principle") {
        if ($required == "all")
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `DC_Approval`= 1 ORDER BY `Date_submission` DESC, `internship_id` DESC";
        else if ($required == "pending")
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `DC_Approval`= 1 AND `status` IN ('approved by dean') ORDER BY `Date_submission` DESC, `internship_id` DESC";
        else if ($required == "rejected") {
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `DC_Approval`= 1 AND `status` IN ('rejected by principal') ORDER BY `Date_submission` DESC, `internship_id` DESC";
        } else
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `status` = '$required'  ORDER BY `Date_submission` DESC, `internship_id` DESC";
    } else if ($role == "Dean") {
        if ($required == "all")
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `HOD_Approval`= 1 ORDER BY `Date_submission` DESC, `internship_id` DESC";
        else if ($required == "pending")
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `HOD_Approval`= 1 AND `status` IN ('approved by hod', 'approved by dean') ORDER BY `Date_submission` DESC, `internship_id` DESC";
        else if ($required == "rejected") {
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `HOD_Approval`= 1 AND `status` IN ('rejected by dean', 'rejected by principal') ORDER BY `Date_submission` DESC, `internship_id` DESC";
        } else
            $query = "SELECT  `internship_id`, `Topic`, `status`, `Date_submission` FROM `internships` WHERE `Sdrn` IN ( SELECT Sdrn FROM faculty WHERE Department = '$dept') AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' AND `status` = '$required'  ORDER BY `Date_submission` DESC, `internship_id` DESC";
    }


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
function upload_details($sdrn, $location, $topic, $consultancy, $company_name, $amount, $path, $count, $startdate, $enddate, $skill, $submission_date)
{
    global $conn;


    $email = $_SESSION['email_id'];
    $query = "INSERT INTO `internships` (`Sdrn`, `location`, `Topic`, `Consultancy_Type`,`Company_Name`, `Tentative_Amount`, `Abstract`, `Members_Count`, `From_Date`, `To_Date`, `Skills`, `Date_Submission`, `status`) VALUES ('$sdrn', '$location', '$topic','$consultancy','$company_name','$amount','$path','$count','$startdate','$enddate','$skill','$submission_date','pending') ";

    $result = mysqli_query($conn, $query);
    $body = 'You have filled form successfully<br>it is sent to hod for approval<br>for more details <a href = "localhost/internship-approval-master/faculty">click here</a>';

    // sends mail to faculty
    sendMail($email, $topic . ' is sent for approval', $body);
    // sending mail to hod of faculty
    $dept = $_SESSION['dept'];
    $query = "SELECT `Email` FROM `faculty` WHERE `Sdrn` = (SELECT `Sdrn` FROM `hod` WHERE `dept` = '$dept')";
    $data = mysqli_query($conn, $query);
    if ($data)
        echo "success";
    else
        mysqli_error($conn);
    $res = mysqli_fetch_assoc($data);
    $email = $res['Email'];
    $body = $sdrn . ' have applied for' . $topic . '<br>for more details <a href = "localhost/internship-approval-master/hod">click here</a>';
    sendMail($email, $topic . ' is sent for approval', $body);

    $queryi = "SELECT MAX(`internship_id`) AS MAXIMUM FROM `internships`";
    $data = mysqli_query($conn, $queryi);
    $res = mysqli_fetch_assoc($data);
    $id =  $res['MAXIMUM'];
?>
    <script>
        window.location.href = "view_form.php?internship_id=<?php echo $id ?>&status=pending"
    </script>
    <?php
}

function Set_Details($role, $response, $internship_id, $email, $topic)
{
    global $conn;
    if ($response == 'accept') {
        if ($role == 'HOD') {
            $query = "UPDATE `internships` SET `HOD_Approval` =  1 , `status` = 'approved by hod' WHERE `internship_id` = $internship_id;";

            if (mysqli_query($conn, $query))
                echo "success";
            else
                mysqli_error($conn);

            $query = "SELECT `Email_id` FROM `admin_details` WHERE `role` = 'dean'";
            $result = mysqli_query($conn, $query);
            echo mysqli_error($conn);
            $email = mysqli_fetch_assoc($result)['Email_id'];
            echo $email;

            $subject = $topic . ' is sent for approval';
            $body = $topic . ' is approved by hod and sent for approval<br>for more details <a href = "localhost/internship-approval-master/dean">click here</a>';
            sendMail($email, $subject, $body);
    ?>
            <script>
                alert("form is approved")
                window.location.href = "./home.php"
            </script>
        <?php
        } else if ($role == 'principal') {
            $query = "UPDATE `internships` SET `Principal_Approval` = 1, `status` = 'approved' WHERE `internship_id` = '$internship_id'";
            $result = mysqli_query($conn, $query);
            if ($result)
                echo "success";
            else
                echo  mysqli_error($conn);
            // $body = $topic . ' is approved <br>for more details <a href = "localhost/internship-approval-master/faculty">click here</a>';
            // sendMail($email, $topic . ' is  approved', $body);
        ?>
            <script>
                alert("form is approved")
                window.location.href = "./dept.php"
            </script>
        <?php

        } else if ($role == 'Dean') {
            $query = "UPDATE `internships` SET `DC_Approval` = 1, `status` = 'approved by dean' WHERE `internship_id` = '$internship_id'";
            mysqli_query($conn, $query);

            $query = "SELECT `Email_id` FROM `admin_details` WHERE `role` = 'principal'";
            $result = mysqli_query($conn, $query);
            $email = mysqli_fetch_assoc($result)['Email_id'];
            $subject = $topic . ' is sent for approval';
            $body = $topic . ' is approved by Dean and sent for approval<br>for more details <a href = "localhost/internship-approval-master/principal">click here</a>';
            sendMail($email, $subject, $body);
        ?>
            <script>
                alert("form is approved")
                window.location.href = "./dept.php"
            </script>
        <?php
        }
    } else {
        if ($role == 'HOD') {
            echo $response;
            $query = "UPDATE `internships` SET  `Rejection_Reason`= '$response', `status` = 'rejected by hod' WHERE `internship_id` = '$internship_id'";
            if ($query)
                echo "success";
            mysqli_query($conn, $query);
            echo mysqli_error($conn);

            $body = $topic . ' is rejected by hod<br>for more details <a href = "localhost/internship-approval-master/faculty">click here</a>';
            sendMail($email, $topic . ' is rejected by hod', $body);
        ?>
            <script>
                alert("form is rejected")
                window.location.href = "./home.php"
            </script>
        <?php
        } else if ($role == 'principal') {
            $query = "UPDATE `internships` SET  `Rejection_Reason`= '$response', `status` = 'rejected by principal' WHERE `internship_id` = '$internship_id'";
            if ($query)
                echo "success";
            mysqli_query($conn, $query);
            echo mysqli_error($conn);

            $body = $topic . ' is rejected by principal<br>for more details <a href = "localhost/internship-approval-master/faculty">click here</a>';
            sendMail($email, $topic . ' is rejected by principal', $body);
        ?>
            <script>
                alert("form is rejected")
                window.location.href = "./dept.php"
            </script>
        <?php
        } else if ($role == 'Dean') {
            $query = "UPDATE `internships` SET  `status` = 'rejected by dean' , `Rejection_Reason`= '$response' WHERE `internship_id` = '$internship_id'";
            mysqli_query($conn, $query);

            $body = $topic . ' is rejected by din<br>for more details <a href = "localhost/internship-approval-master/faculty">click here</a>';
            sendMail($email, $topic . ' is rejected by din', $body);
        ?>
            <script>
                alert("form is rejected")
                window.location.href = "./dept.php"
            </script>
    <?php
        }
    }
    ?>
    <script>
        //window.location.href = "home.php"
    </script>
<?php
}

//function to Print OutwardNo after status Approved
function outward_details($internship_id, $sdrn, $email, $topic)
{
    global $conn;
    $dept = $_SESSION['dept'];
    $query = " SELECT Count(`internship_id`) AS 'max' FROM `internships` WHERE `status`='approved' AND `Sdrn` IN ( SELECT `Sdrn` FROM `faculty` WHERE `Department`='$dept')";
    $data = mysqli_query($conn, $query);
    // echo mysqli_num_rows($data);
    $result = mysqli_fetch_assoc($data);
    $res = sprintf("%02d", $result['max']);

    $date = date("Y");
    $outward = 'RAIT/' . $dept . '/SDG-RAIT/' . $date . '-' . (substr($date + 1, -2)) . '/' . $res;

    $querit = "UPDATE `internships` SET `Outward_Number`='$outward' WHERE `internship_id`='$internship_id' AND `Sdrn`='$sdrn'";
    mysqli_query($conn, $querit);


    $body = $topic . ' is approved. your outward no is ' . $outward . '<br>for more details <a href = "localhost/internship-approval-master/faculty">click here</a>';
    sendMail($email, $topic . ' is  approved', $body);
}

//function to upload quotation details in Internships directory
function quotation_details($id, $sdrn, $amount, $taxes, $charges, $time)
{
    global $conn;

    $query = "UPDATE `internships` SET `development_cost`='$amount',`taxes`='$taxes',`maintenance`='$charges',`delivery_time`='$time',`quotation`=1 WHERE `internship_id`=$id AND `Sdrn`=$sdrn";
    $result = mysqli_query($conn, $query);
    if ($result)
        echo "success";
    else
        mysqli_error($conn);
?>
    <script>
        window.location.href = "next.php?internship_id=<?php echo $id ?>"
    </script>

<?php
}

function updatefile_upload($id,$sdrn)
{
    global $conn;
   $query = "UPDATE `internships` SET `consultancy_upload`=1 WHERE `internship_id`='$id' AND `Sdrn`='$sdrn'";
   mysqli_query($conn,$query);
?>
<script>
    window.location.href= "view_uploadform.php?internship_id=<?php echo $id ?>"
</script>
<?php
}

?>
