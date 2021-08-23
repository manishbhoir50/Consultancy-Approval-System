<?php
include("../assets/php_modules/connection.php");
include("../assets/php_modules/common_methods.php");

if (isset($_POST['Excel'])) {
    header('Location:../assets/php_modules/exporttoexcel.php');
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
    <header id="header">

        <!-- header we have already created we are calling header.php file -->
        <?php include('../assets/php_modules/header.php') ?>

    </header>
    <!-- success message after login cookie is used to keep track that  user have log in recently but not refreshed page -->
    <?php

    if (isset($_POST['log-out'])) {
        log_out();
    }

    $is_date_clicked = false;
    $start_date = $_SESSION['start_date'];
    $end_date = $_SESSION['end_date'];


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

        <!-- start date and end date -->
        <form method="post" style="margin-top : 2rem">
            <div class="d-flex justify-content-center">
                <input type="date" name="start_date" class="mr-3" style="margin-right : 10px !important" value="<?php echo $start_date ?>">
                <input type="date" name="end_date" class="ml-5" value="<?php echo $end_date ?>">
            </div>
            <div class="btn-container mx-auto d-flex justify-content-center" style="margin-top:10px; margin-bottom: 10px">
                <input type="submit" class="btn" name="go" value="Get Internships">
            </div>
        </form>


        <!-- table  -->

        <div class="table-container mx-auto mt-3" id="table">
            <?php
            $dept = $_SESSION["dept"];
            
            $query = "SELECT * FROM `internships` NATURAL JOIN `faculty` WHERE `status`= 'approved' AND `consultancy_upload`='1' AND `DEPARTMENT` = '$dept' AND `ongoing`='0' ORDER BY `Date_submission` DESC, `internship_id` DESC ";
            
            if (isset($_POST['go'])) {
                $start_date = $_SESSION['start_date'] = $_POST["start_date"];
                $end_date = $_SESSION['end_date'] = $_POST["end_date"];
                $is_date_clicked = true;

                $query = "SELECT * FROM `internships` NATURAL JOIN `faculty` WHERE `status`= 'approved' AND `consultancy_upload`='1' AND `DEPARTMENT` = '$dept' AND `ongoing`='0' AND `Date_submission` >= '$start_date' AND `Date_submission` <= '$end_date' ORDER BY `Date_submission` DESC, `internship_id` DESC ";

            }
            
            $result = mysqli_query($conn,$query);

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
                                <td><a href="view_form.php?internship_id=<?php echo $data['internship_id'] ?>" class="text-decoration-none text-dark"><?php echo $data['Topic'] ?><a href="#"></td>

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