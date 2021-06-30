<?php
session_start();
include_once("../assets/php_modules/connection.php");
include_once("../assets/php_modules/common_methods.php");


if (isset($_POST['log-out'])) {
    log_out();
}

$status = $_SESSION['status'];
$_SESSION["current_status"] = $status;
$is_date_clicked = false;
$start_date = $_SESSION['start_date'];
$end_date = $_SESSION['end_date']; 
if(isset($_POST['go'])){
    $start_date = $_SESSION['start_date'] = $_POST["start_date"];
    $end_date = $_SESSION['end_date'] = $_POST["end_date"];
    $is_date_clicked = true;
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

    <!-- external javascript link -->
    <script src="../assets/js/main.js"></script>

    <!-- jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- google font cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Roboto+Condensed&display=swap" rel="stylesheet">


    <!-- external stylesheet link -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Home</title>
</head>

<body>

    <!-- navbar of page -->
    <header class="position-sticky">

        <!-- college logo and name -->
        <div class="collge-header d-flex align-items-center">
            <div class="college-logo">
                <img src="../assets/images/logo.jpeg" alt="dy patil logo" id="college-logo">
            </div>
            <div class="college-name add-font">
                <h1 class="text-center" id="college-name">RAMRAO ADIK INSTITUTE OF TECHNOLOGY</h1>
            </div>
        </div>

        <!-- actual colored navbar -->
        <div class="main-header">
            <div class="container-fluid main_menu">
                <div class="row no-gutters">
                    <div class="col-md-10 col-12 mx-auto">
                        <nav class="navbar navbar-expand-sm navbar-light">
                            <div class="container-fluid">


                                <!-- RAIT Internship -->
                                <a class="navbar-brand heart-beat-animation" href="#">Consultancy Project</a>

                                <button class="navbar-toggler mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                    <!-- menu on right side -->
                                    <form class="d-flex form-width justify-content-between flex-wrap-reverse mt-2" method="POST">

                                        <!-- buttons on right side -->
                                        <div class="form-btn-container mt-2">
                                            <!-- apply button -->
                                            <a class="btn btn-light mr-2" href="./apply.php">Apply</a>

                                            <!-- log out button -->
                                            <button class="btn btn-light" href="#" type="submit" name="log-out">Logout</button>
                                        </div>

                                        <!-- profile -->
                                        <div class="d-flex align-items-center justify-content-center profile-container">
                                            <div class="profile d-flex justify-content-center align-items-end" style = "margin-right : 5px !important">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <span><?php echo $_SESSION['first_name'] ?></span>
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

    <!-- success message after login cookie is used to keep track that  user have log in recently but not refreshed page -->
    <?php
    if ($_SESSION['log_in']) {
    ?>
        <h1 class="text-center alert alert-success text-dark" id="success-msg">You have login successfully</h1>

        <!-- javascript to remove success alert -->
        <script>
            let success_msg = document.getElementById("success-msg");
            setTimeout((succcess_msg) => {
                success_msg.style.display = "none";
            }, 3000, success_msg)
        </script>
    <?php
        $_SESSION['log_in'] = 0;
    }
    ?>

    <!-- content of page -->
    <main>

        <!-- your internship details -->
        <h1 class="text-center text-uppercase mt-3 add-font">Consultancy Details</h1>

        <!-- flexbox containing buttons all pending approved completed rejected -->
        <form method="POST" class="btn-container d-flex justify-content-center w-100 flex-wrap">
            <button href="index.html" class="btn  loader" id="all" type="submit" name="all">All</button>
            <button href="pending.html" class="btn loader" id="pending" type="submit" name="pending">Pending</button>
            <button href="approved.html" class="btn loader" id="approved" type="submit" name="approved">Approved</button>
            <button href="completed.html" class="btn loader" id="completed" type="submit" name="completed">Completed</button>
            <button href="rejected.html" class="btn loader" id="rejected" type="submit" name="rejected">Rejected</button>
        </form>

        <!-- start date and end date -->
        <form method = "post" style = "margin-top : 20px">
              <div class="d-flex justify-content-center">
              <input type="date" name = "start_date" class = "mr-3" style = "margin-right : 10px !important" value = "<?php echo $start_date ?>">
              <input type="date" name = "end_date" class = "ml-5" value = "<?php echo $end_date ?>">
              </div>
              <div class="btn-container mx-auto d-flex justify-content-center" style = "margin-top:10px; margin-bottom: 10px">
                   <input type="submit" class="btn" name = "go" value = "Get Internships">
              </div>
        </form>
         
        <!-- table  -->

        <div class="table-container mx-auto mt-3" id="table">
            <?php
            if (isset($_POST['pending']) || ($is_date_clicked && $status == "pending")) {
            ?>
                <script>
                    clear_table(document.getElementById('pending'));
                </script>
            <?php
                $_SESSION['status'] = "pending";
                $result = load_details('pending', 'faculty', $_SESSION['sdrn'], '', $start_date, $end_date);
            } else if (isset($_POST['approved']) || ($is_date_clicked && $status == "approved")) {
            ?>
                <script>
                    clear_table(document.getElementById('approved'));
                </script>
            <?php
            $_SESSION['status'] = "approved";
                $result = load_details('approved', 'faculty', $_SESSION['sdrn'], '', $start_date, $end_date);
            } else if (isset($_POST['completed']) || ($is_date_clicked && $status == "completed")) {
            ?>
                <script>
                    clear_table(document.getElementById('completed'));
                </script>
            <?php
            $_SESSION['status'] = "completed";
                $result = load_details('completed', 'faculty', $_SESSION['sdrn'], '', $start_date, $end_date);
            } else if (isset($_POST['rejected']) || ($is_date_clicked && $status == "rejected")) {
            ?>
                <script>
                    clear_table(document.getElementById('rejected'));
                </script>
            <?php
            $_SESSION['status'] = "rejected";
                $result = load_details('rejected', 'faculty', $_SESSION['sdrn'], '', $start_date, $end_date);
            } else {
            ?>
                <script>
                    clear_table(document.getElementById('all'));
                </script>
            <?php
            $_SESSION['status'] = "all";
                $result = load_details('all', 'faculty', $_SESSION['sdrn'], '', $start_date, $end_date);
            }
            $is_date_clicked = false;
            // if no internship found then message will be displayed otherwise details whatever we found will be displayed
            if (mysqli_num_rows($result) == 0) {
            ?>
                <h1 class="text-center" class="add-font">Oops no internship found!!</h1>
            <?php
            } else {
            ?>

                <table class="table table-striped table-hover">
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
                                <?php
                                $status = str_replace(' ', '', $data['status']);
                                ?>
                                <td><a href="view_form.php?internship_id=<?php echo $data['internship_id'] ?>&status=<?php echo $status ?>" class="text-decoration-none text-dark"><?php echo $data['Topic'] ?><a href="#"></td>

                                <td><?php echo ucwords($data['status'])  ?></td>
                                <td><?php echo $data['Date_submission'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            }
            ?>

        </div>

        
    </main>



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