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


    // if no internship found then message will be displayed otherwise details whatever we found will be displayed
    if (mysqli_num_rows($result) == 0) {
    ?>
        <h1 class="text-center" class="add-font">Oops no internship found!!</h1>
    <?php
    } else {
    ?>

        <table class="table table-striped">
            <thead class="table-header">
                <tr>
                    <th>INTERNSHIP ID</th>
                    <th>TOPIC</th>
                    <th>STATUS</th>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $data['internship_id'] ?></td>

                        <!-- after clicking on topic we will redirect to view_form.php and we will send sdrn and internship_id through get method -->
                        <td><a href="view_form.php?internship_id=<?php echo $data['internship_id'] ?>" class="text-decoration-none text-dark"><?php echo $data['Topic'] ?><a href="#"></td>

                        <td><?php echo $data['status'] ?></td>
                        <td><?php echo $data['Date_submission'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
<?php
    }
}



// function for viewing form
function view($internship_id){


    include("../assets/php_modules/connection.php");

    global $conn;

    // query to fetch internship details
    $query = "SELECT * FROM `internships` WHERE `internship_id` = '$internship_id'";
    $result = mysqli_query($conn, $query);
    $form = mysqli_fetch_assoc($result);

    $sdrn = $form['Sdrn'];

    // query to fetch faculty details
    $query = "SELECT * FROM `faculty` WHERE `Sdrn` = '$sdrn'";
    $result = mysqli_query($conn, $query);
    $faculty = mysqli_fetch_assoc($result);

?>

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
             <label for="company_name" class="form-label no-gutters"> Comapany Name </label>
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
             <a class="form-control text-decoration-none" href = "<?php echo $path ?>"><?php echo $basename ?></a>
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

     </form>
    </div>


    <!-- Go back to home page -->
    <div class=" d-flex justify-content-center mt-4 btn-container">
     <a class="btn text-decoration-none" href="./home.php">Go back to home page</a>
    </div>


    <?php
    }
    ?>



<?php

// function for loading header
function load_header(){
    session_start();

    if(isset($_POST['log-out'])){
       log_out();
    }
    ?>


    <header class = "position-sticky">


        <!-- college logo and name -->
        <div class="collge-header d-flex align-items-center">
            <div class="college-logo">
               <img src="../assets/images/logo.jpg" alt="dy patil logo" id = "college-logo">
            </div>
            <div class="college-name add-font">
                <h1 class="text-center" id = "college-name">Ramrao adik institute of technology</h1>
            </div>
        </div>

        <!-- actual navbar red colored -->
        <div class="main-header" style = "position : sticky !important; top : 0px !important">
            <div class="container-fluid main_menu">
                <div class="row no-gutters">
                    <div class="col-md-10 col-12 mx-auto">
                        <nav class="navbar navbar-expand-sm navbar-light">
                            <div class="container-fluid">
                         

                                <!-- RAIT Internship -->
                                <a class="navbar-brand heart-beat-animation" href="#">RAIT Internship</a>

                              <button class="navbar-toggler mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                 <!-- menu on right side -->
                                 <form class="d-flex form-width justify-content-between flex-wrap-reverse mt-2" method = "POST">

                                    <!-- buttons on right side -->
                                    <div class="form-btn-container mt-2">
                                        <!-- apply button -->
                                        <a class="btn btn-light mr-2 hide-me" href="#">Apply</a>

                                        <!-- log out button -->
                                        <button class="btn btn-light" href="#" type = "submit" name = "log-out">log out</button>
                                    </div>

                                    <!-- profile -->
                                    <div class="d-flex align-items-center justify-content-between profile-container">
                                        <div class="profile d-flex justify-content-center align-items-end">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span><?php echo $_SESSION['sdrn'] ?></span>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php
}
?>