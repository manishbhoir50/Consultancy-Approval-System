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

  <!-- jquery cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <!-- external javascript link -->
  <script src="../assets/js/main.js"></script>

  <!-- external stylesheet link -->
  <link rel="stylesheet" href="../assets/css/style.css">

  <!-- google font cdn -->
  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Roboto+Condensed&display=swap" rel="stylesheet">


  <title>Apply</title>
</head>

<body>


  <header id="header">
    <?php
    include_once("../assets/php_modules/connection.php");
    include_once("../assets/php_modules/common_methods.php");
    include_once("../assets/php_modules/header.php");
    include_once('../assets/send_mail.php');
    $faculty = display_details();
    $date = display_date();

    if (isset($_POST['submit'])) {
      $sdrn = $faculty['Sdrn'];
      $path = upload_file($sdrn);

      $topic = $_POST['topic'];
      $consultancy = $_POST['consultancy'];
      $company_name = $_POST['company_name'];
      $amount = $_POST['amount'];
      $count = $_POST['count'];
      $startdate = $_POST['startdate'];
      $enddate = $_POST['enddate'];
      $skill = $_POST['skill'];
      $addr = $_POST['location'];
      $submission_date = $date;


      upload_details($sdrn,$addr,  $topic, $consultancy, $company_name, $amount, $path, $count, $startdate, $enddate, $skill, $submission_date);
      
    }
    
    ?>
  </header>

  <h1 class="text-center mt-5 mb-3" class="add-font">Pre Approval Form</h1>

  <!-- validation message if all fileds are not filled -->
  <h3 class="text-center mb-3 add-font validation-msg alert alert-danger add-font" id="error-msg">Please fill all the required fields*</h3>

  <div class="container form-radius">
  
  <form onsubmit="return validate_me()" method="post" enctype="multipart/form-data">
      <div class="mt-3 mb-3">
        <label for="faculty_sdrn" class="form-label">Faculty SDRN </label>
        <input type="text" class="form-control" id="faculty_sdrn" name="sdrn" placeholder="Enter your SDRN" value="<?php echo $faculty['Sdrn'] ?>" disabled>
      </div>

      <label for="name" class="form-label">Faculty Name</label>
      <div class="row  mb-3">
        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12 mb-3">
          <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?php echo $faculty['First_name'] ?>" disabled>
        </div>
        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12 mb-3">
          <input type="text" class="form-control" placeholder="Middle name" aria-label="Middle name" value="<?php echo $faculty['Middle_name'] ?>" disabled>
        </div>
        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-12">
          <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="<?php echo $faculty['Last_name'] ?>" disabled>
        </div>
      </div>

      <div class="mb-3">
        <label for="designation" class="form-label"> Designation </label>
        <input type="text" class="form-control input-required" id="designation" placeholder="Enter your Designation" onchange="remove_error(this)" value="<?php echo $faculty['Desig'] ?>" disabled>
      </div>

      <!-- topic - this is extra field added -->
      <div class="mb-3">
        <label for="topic" class="form-label label-required"> Topic </label>
        <input type="text" class="form-control input-required" id="topic" name="topic" placeholder="Enter your topic" onchange="remove_error(this)" value="<?php if (isset($topic)) echo $topic ?>">
      </div>

      <fieldset class="row mb-3 no-gutters">
        <legend class="col-form-label col-sm-3 pt-0 label-required">Type of Consultancy</legend>
        <div class="col-sm-8 d-flex justify-content-start">
          <div class="form-check mr-3" style="margin-right: 20px !important;">
            <input class="form-check-input" type="radio" name="consultancy" id="inhouse" value="I" checked>
            <label class="form-check-label" for="inhouse">
              INHOUSE
            </label>
          </div>
          <div class="form-check ml-3">
            <input class="form-check-input" type="radio" name="consultancy" id="outhouse" value="O">
            <label class="form-check-label" for="outhouse">
              OUTHOUSE
            </label>
          </div>
        </div>
      </fieldset>

      <div class="mb-3 no-gutters">
        <label for="company_name" class="form-label no-gutters label-required">Organisation/Company Name </label>
        <input type="text" class="form-control input-required" id="company_name" name="company_name" placeholder="Enter Company Name" onchange="remove_error(this)">
      </div>

      <div class="col-12 mb-3">
        <label for="inputAddress" class="form-label label-required">Location/Address</label>
        <input type="text" class="form-control input-required" id="inputAddress" placeholder="Enter your Address" name = "location"  onchange="remove_error(this)">
      </div>

      <label for="amount" class="form-label label-required">Tentative Amount</label>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
        <input type="number" class="form-control input-required" id="amount" name="amount" placeholder="Enter Amount" onchange="remove_error(this)">
      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label label-required">Abstract: Uploading Word File Option</label>
        <input class="form-control input-required" type="file" id="formFile" name="file" accept="application/pdf,application/vnd.ms-excel" onchange="remove_error(this)" />
        <small class="text-muted">Note: Only Pdf file is allowed </small>
      </div>

      <div class="row mb-3 no-gutters">
        <label for="count" class="col-sm-6 col-form-label">
          Count of Team Members / Programmers -
        </label>
        <div class="col-sm-5">
          <input type="number" class="form-control" id="count" name="count">
        </div>
      </div>

      <label for="date" class="form-label label-required">Expected Timeline -</label>
      <div class="mb-3 row ">
        <div class="col mb-1"> From Date <input type="date" name="startdate" id="startdate" class = "input-required" onchange="remove_error(this)"> </div>
        <div class="col mb-1"> To Date <input type="date" name="enddate" id="enddate" class = "input-required" onchange="remove_error(this)"> </div>
      </div>

      <div class="mb-3">
        <label for="skillset" class="form-label label-required"> Skill Set/ Technology Required </label>
        <input type="text" class="form-control input-required" id="skillset" placeholder="Enter Skills Required" name="skill" onchange="remove_error(this)">
      </div>

      <!-- submit button -->
      <div class=" d-flex justify-content-center mt-4 btn-container">
        <button type="submit" name="submit" class="btn text-decoration-none">Submit</button>
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