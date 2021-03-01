<?php
session_start();
include("../assets/php_modules/connection.php");
include("../assets/php_modules/common_methods.php");

if (isset($_POST['log-out'])) {
    log_out();
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
                <img src="../assets/images/logo.jpg" alt="dy patil logo" id="college-logo">
            </div>
            <div class="college-name add-font">
                <h1 class="text-center" id="college-name">Ramrao adik institute of technology</h1>
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
                                <a class="navbar-brand heart-beat-animation" href="#">RAIT Internship</a>

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
                                            <button class="btn btn-light" href="#" type="submit" name="log-out">log out</button>
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
        <h1 class="text-center text-uppercase mt-5 add-font">Your Internship details</h1>

        <!-- flexbox containing buttons all pending approved completed rejected -->
        <form method="POST" class="btn-container d-flex justify-content-center w-100 flex-wrap">
            <button href="index.html" class="btn  loader" id="all" type="submit" name="all">all</button>
            <button href="pending.html" class="btn loader" id="pending" type="submit" name="pending">pending</button>
            <button href="approved.html" class="btn loader" id="approved" type="submit" name="approved">approved</button>
            <button href="completed.html" class="btn loader" id="completed" type="submit" name="completed">completed</button>
            <button href="rejected.html" class="btn loader" id="rejected" type="submit" name="rejected">rejected</button>
        </form>

        <!-- table  -->

        <div class="table-container mx-auto mt-5" id="table">

            <?php
            session_start();
            $Department = $_SESSION['dept'];
            if (isset($_POST['pending'])) {
              echo "pending";
            ?>
                <script>
                    clear_table(document.getElementById('pending'));
                </script>
            <?php
                $result = load_details('pending', 'Principle', '', $Department);                       
            } else if (isset($_POST['approved'])) {
            ?>
                <script>
                    clear_table(document.getElementById('approved'));
                </script>
            <?php
                $result = load_details('approved', 'Principle', '', $Department);
            } else if (isset($_POST['completed'])) {
            ?>
                <script>
                    clear_table(document.getElementById('completed'));
                </script>
            <?php
                $result = load_details('completed', 'Principle', '', $Department);
            } else if (isset($_POST['rejected'])) {
            ?>
                <script>
                    clear_table(document.getElementById('rejected'));
                </script>
            <?php
                $result = load_details('rejected', 'Principle', '', $Department);
            } else {
            ?>
                <script>
                    clear_table(document.getElementById('all'));
                </script>
            <?php
                $result = load_details('all', 'Principle', '', $Department);
            }
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
                                <td><a href="view_form.php?internship_id=<?php echo $data['internship_id'] ?>&status=<?php echo $data['status']?>" class="text-decoration-none text-dark"><?php echo $data['Topic'] ?><a href="#"></td>

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
