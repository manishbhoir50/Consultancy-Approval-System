<?php
include("../assets/php_modules/common_methods.php");
include("../assets/php_modules/form_details.php");


// internship_id and sdrn are through href you can see them in url 
$internship_id = $_GET['internship_id'];
$form = get_form_details($internship_id);
$sdrn = $form['Sdrn'];
$status = $_GET['status'];
$faculty = get_faculty_details($sdrn);
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
                <input type="text" class="form-control" id="inputAddress" value="<?php echo $faculty['Addr'] ?>" disabled>
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

            <div class="row mb-3 no-gutters">
                <label for="submissiondate" class="form-label">Date of Submission for Approval</label>
                <div class="col-sm-7">
                    <input type="date" class="form-control input-required" id="submissiondate" style="text-align: center;" value="<?php echo $form['Date_submission'] ?>" disabled>
                </div>
            </div>

            <?php

            if ($status == 'rejectedbyhod' || $status == 'rejectedbyprincipal' || $status == 'rejectedbydean') {
            ?>
                <div class="row mb-3 no-gutters">
                    <label for="submissiondate" class="form-label">Rejection reason</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control input-required" id="inputAdress" style="text-align: center;" value="<?php echo $form['Rejection_Reason'] ?>" disabled>
                    </div>
                </div>
        </form>
    </div>
           <?php
            }
           ?>
</form>
</div>

<?php
    if($status == 'approved'){
        ?>
            <div>
                <form method = "post" class="btn-container d-flex justify-content-center w-100 flex-wrap">
                    <button name = "quoatation" class = "btn loader">download quotation letter</button>
                    <button name = "acceptance" class = "btn loader">upload acceptance letter</button>
                    <button name = "payment" class = "btn loader">upload payment receipt</button>
                </form>
            </div>
        <?php
    }
?>
<!-- Go back to home page -->
<div class=" d-flex justify-content-center mt-4 btn-container">
    <a class="btn text-decoration-none" href="./home.php">Go back to home page</a>
</div>


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