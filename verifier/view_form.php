<?php
include("../assets/php_modules/common_methods.php");
include("../assets/php_modules/form_details.php");
include_once("../assets/send_mail.php");

// internship_id and sdrn are through href you can see them in url 
$internship_id = $_GET['internship_id'];
$form = get_form_details($internship_id);
$sdrn = $form['Sdrn'];
$faculty = get_faculty_details($sdrn);
$document = get_document_details($internship_id);

if(isset($_POST['accept'])){
    $query  = "UPDATE `internships` SET `status`='completed',`ongoing`= '1' WHERE `internship_id`='$internship_id'";
    mysqli_query($conn,$query);

    $query= "SELECT `Email` FROM `faculty` WHERE `Sdrn` = (SELECT `Sdrn` FROM `internships` WHERE `internship_id`= '$internship_id' )";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $email = $data['Email'];
    $topic = $form['Topic'];
    $body = 'Congratulations!!!  '.$topic . ' is verified by Verifier and Status is changed to Completed '. '<br>  <a href = "localhost/internship-approval-master/faculty">click here</a>';
    sendMail($email, $topic . ' is verified', $body);

    header('Location:./home.php');
}

if(isset($_POST['reject'])){
    $query = "UPDATE `internships` SET `consultancy_upload`='0' WHERE `internship_id`='$internship_id'";
    mysqli_query($conn,$query);

    $query = "SELECT * FROM `documents` WHERE `internship_id`='$internship_id'";
    $data = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($data);
    $filename1 = $result['acceptance'];   
    $filename2 = $result['payment'];   
    $dirname = dirname($filename1);   
    unlink($filename1);
    unlink($filename2);
    rmdir($dirname );

    $query = "DELETE FROM `documents` WHERE `internship_id`='$internship_id'";
    mysqli_query($conn,$query);

    $query= "SELECT `Email` FROM `faculty` WHERE `Sdrn` = (SELECT `Sdrn` FROM `internships` WHERE `internship_id`= '$internship_id' )";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $email = $data['Email'];
    $topic = $form['Topic'];
    $body =  $topic . ' is rejected by Verifier, due to '. $_COOKIE["response"] .'<br>  <a href = "localhost/internship-approval-master/faculty"> click here </a>';
    sendMail($email, $topic . ' is rejected by verifier', $body);

    header('Location:./home.php');
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <!-- external stylesheet link -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- external javascript link -->
    <script src="../assets/js/main.js"></script>

    <!-- google font cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Roboto+Condensed&display=swap" rel="stylesheet">


    <title>view form</title>
</head>

<body>


    <header id="header">

        <!-- header we have already created we are calling header.php file -->
        <?php include('../assets/php_modules/header.php') ?>

    </header>
    <!-- this will show internship topic -->
    <h1 class="text-center mt-5 mb-3" class="add-font"><?php echo $form['Topic'] ?></h1>


    <!-- form is disabled and values which we have fetched from database are shown in input field  -->
    <div class="container form-radius">


        <form>
            <div class="mt-3 mb-3">
                <label for="faculty_sdrn" class="form-label">Faculty SDRN </label>
                <input type="text" class="form-control" id="faculty_sdrn" value="<?php echo $faculty['Sdrn'] ?>" disabled>
            </div>

            <label for="name" class="form-label">Faculty Name</label>
            <div class="row  mb-3">
                <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12 mb-3">
                    <input type="text" class="form-control" aria-label="First name" value="<?php echo $faculty['First_name'] ?>" disabled>
                </div>
                <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12 mb-3">
                    <input type="text" class="form-control" aria-label="Middle name" value="<?php echo $faculty['Middle_name'] ?>" disabled>
                </div>
                <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12">
                    <input type="text" class="form-control" aria-label="Last name" value="<?php echo $faculty['Last_name'] ?>" disabled>
                </div>
            </div>

            <div class="mb-3">
                <label for="designation" class="form-label"> Designation </label>
                <input type="text" class="form-control input-required" id="designation" value="<?php echo $faculty['Desig'] ?>" disabled>
            </div>

            <!-- topic - this is extra field added -->
            <div class="mb-3">
                <label for="topic" class="form-label"> Topic </label>
                <input type="text" class="form-control input-required" id="topic" value="<?php echo $form['Topic'] ?>" disabled>
            </div>

            <fieldset class="row mb-3 no-gutters">
                <legend class="col-form-label col-sm-3 pt-0">Type of Consultancy</legend>
                <div class="col-sm-8 d-flex justify-content-start">
                    <div class="form-check mr-3" style="margin-right: 20px !important;">
                        <input class="form-check-input" type="radio" name="radio" id="inhouse" value="I" disabled>
                        <label class="form-check-label" for="inhouse">
                            INHOUSE
                        </label>
                    </div>
                    <div class="form-check ml-3">
                        <input class="form-check-input" type="radio" name="radio" id="outhouse" value="O" disabled>
                        <label class="form-check-label" for="outhouse">
                            OUTHOUSE
                        </label>
                    </div>
                </div>
            </fieldset>


            <!-- code to make radio button checked inhouse or outhouse -->
            <?php
            if ($form['Consultancy_Type']  == 'I') {
            ?>
                <script>
                    document.getElementById('inhouse').checked = true;
                </script>
            <?php
            } else {
            ?>
                <script>
                    document.getElementById('outhouse').checked = true;
                </script>
            <?php
            }
            ?>


            <div class="mb-3 no-gutters">
                <label for="company_name" class="form-label no-gutters"> Organisation/Company Name </label>
                <input type="text" class="form-control" id="company_name" value="<?php echo $form['Company_Name'] ?>" disabled>
            </div>

            <div class="col-12 mb-3">
                <label for="inputAddress" class="form-label">Location/Address</label>
                <input type="text" class="form-control" id="inputAddress" value="<?php echo $form['location'] ?>" disabled>
            </div>

            <label for="amount" class="form-label">Tentative Amount</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                <input type="number" class="form-control input-required" id="amount" value="<?php echo $form['Tentative_Amount'] ?>" disabled>
            </div>

            <?php

            // to get basename of file
            $path = $form['Abstract'];
            $file = pathinfo($path);
            $basename = $file['basename'];
            ?>

            <div class="mb-3">
                <label for="formFile" class="form-label">Abstract: Uploading Word File Option</label>
                <a class="form-control text-decoration-none" href="<?php echo $path ?>" target="_blank"><?php echo $basename ?></a>
                <small class="text-muted">Note: Only Pdf file is allowed </small>
            </div>

            <div class="row mb-3 no-gutters">
                <label for="count" class="col-sm-6 col-form-label">
                    Count of Team Members / Programmers -
                </label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" id="count" value="<?php echo $form['Members_Count'] ?>" disabled>
                </div>
            </div>

            <label for="date" class="form-label">Expected Timeline -</label>
            <div class="mb-3 row ">
                <div class="col mb-1"> From Date <input type="date" name="startdate" id="startdate" value="<?php echo $form['From_Date'] ?>" disabled> </div>
                <div class="col mb-1"> To Date <input type="date" name="enddate" id="enddate" value="<?php echo $form['To_Date'] ?>" disabled> </div>
            </div>

            <div class="mb-3">
                <label for="skillset" class="form-label"> Skill Set/ Technology Required </label>
                <input type="text" class="form-control input-required" id="skillset" value="<?php echo $form['Skills'] ?>" disabled>
            </div>

            <div class="row">
                <div class=" mb-3 col-6">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i> &nbsp; <b> Amount </b> </span>
                    <input type="number" class="form-control input-required" id="amount" value="<?php echo $form['development_cost'] ?>" disabled>
                </div>
                <div class=" mb-3 col-6">
                    <span class="input-group-text"><i class="fa fa-percent"></i> &nbsp; <b> Taxes </b></span>
                    <input type="number" class="form-control input-required" id="amount" value="<?php echo $form['taxes'] ?>" disabled>
                </div>
            </div>

            <div class="col-12 mb-3">
                <label for="inputCharges" class="form-label label-required">Maintenance Charges</label>
                <input type="text" class="form-control input-required" id="inputCharges" value="<?php echo $form['maintenance'] ?>" disabled>
            </div>

            <div class="col-12 mb-3">
                <label for="inputTime" class="form-label label-required">Time of Delivery</label>
                <input type="text" class="form-control input-required" id="inputTime" value="<?php echo $form['delivery_time'] ?>" disabled>
            </div>

            <?php
            // to get basename of file
            $acceptance = $document['acceptance'];
            $payment = $document['payment'];
            $file1 = pathinfo($acceptance);
            $file2 = pathinfo($payment);
            $basename1 = $file1['basename'];
            $basename2 = $file2['basename'];
            ?>

            <div class="mb-3">
                <label for="formFile" class="form-label"> Acceptance letter</label>
                <a class="form-control text-decoration-none" href="<?php echo $acceptance ?>" target="_blank"><?php echo $basename1 ?></a>
                <small class="text-muted">Note: Only Pdf file is allowed </small>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label"> Payment receipt</label>
                <a class="form-control text-decoration-none" href="<?php echo $payment ?>" target="_blank"><?php echo $basename2 ?></a>
                <small class="text-muted">Note: Only Pdf file is allowed </small>

            </div>

            <div class="row mb-3 no-gutters">
                <label for="submissiondate" class="form-label">Date of Submission for Approval</label>
                <div class="col-sm-7">
                    <input type="date" class="form-control input-required" id="submissiondate" style="text-align: center;" value="<?php echo $form['Date_submission'] ?>" disabled>
                </div>
            </div>

            <form method="post">
                <div class="mb-3  d-flex justify-content-start mt-4 btn-container">
                    <a href="../assets/php_modules/form_download.php?id=<?php echo $internship_id ?>" class="btn text-decoration-none">Download Quotation Letter</a>
                </div>
            </form>

        </form>
    </div>
    </div>

    <div class="d-flex justify-content-center">
        <form onsubmit="return Accept_response()" method="post" style="display: inline; margin:0px">
            <div class=" d-flex justify-content-center mt-4 btn-container">
                <button id="accept" class="btn text-decoration-none " type="submit" style="background-color:Green;" name="accept">Accept</button>
            </div>
        </form>

        <form onsubmit="return Reject_response()" method="post" style="display: inline ;margin : 0px">
            <div class=" d-flex justify-content-center mt-4 btn-container">
                <button id="reject" class="btn text-decoration-none" type="submit" value="123" name="reject">Reject</button>
            </div>
        </form>
    </div>

    <br>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>

</html>