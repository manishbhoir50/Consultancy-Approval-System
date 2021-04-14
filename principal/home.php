<?php
include("../assets/php_modules/connection.php");
include("../assets/php_modules/common_methods.php");
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



    <main>


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

        <h1 class="text-center mt-4 add-font">DEPARTMENT</h1>
        <div class="departments">
            <div class="row justify-content-center">
                <!-- computer department -->
                <div class="col-lg-3 col-md-7 col-sm-10 mt-5">
                    <div class="card mx-auto" style="width: 90%;">
                        <img src="../assets/images/cs.jfif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <form action="getDept.php" method="post" class="d-flex justify-content-center btn-container  mt-0 mb-0">
                                <button type="submit" class="btn btn-theme" name="computer">COMPUTER</button>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- IT department -->
                <div class="col-lg-3 col-md-7 col-sm-10 mt-5">
                    <div class="card mx-auto" style="width: 90%;">
                        <img src="../assets/images/it.jfif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <form action="getDept.php" method="post" class="d-flex justify-content-center btn-container  mt-0 mb-0">
                                <button type="submit" class="btn btn-theme" name="IT">INFROMATION TECHNOLOGY</button>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- electronics department -->
                <div class="col-lg-3 col-md-7 col-sm-10 mt-5">
                    <div class="card mx-auto" style="width: 90%;">
                        <img src="../assets/images/ertc.jfif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <form action="getDept.php" method="post" class="d-flex justify-content-center btn-container  mt-0 mb-0">
                                <button type="submit" class="btn btn-theme" name="electronics">ELECTRONICS</button>
                            </form>
                        </div>
                    </div>
                </div>



            </div>


            <div class="row justify-content-center">

                <!-- extc department -->
                <div class="col-lg-3 col-md-7 col-sm-10 mt-5">
                    <div class="card mx-auto" style="width: 90%;">
                        <img src="../assets/images/entc.jfif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <form action="getDept.php" method="post" class="d-flex justify-content-center btn-container  mt-0 mb-0">
                                <button type="submit" class="btn btn-theme" name="entc">EXTC</button>
                            </form>
                        </div>
                    </div>
                </div>




                <!-- instrumentation department -->
                <div class="col-lg-3 col-md-7 col-sm-10 mt-5">
                    <div class="card mx-auto" style="width: 90%;">
                        <img src="../assets/images/instru.jfif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <form action="getDept.php" method="post" class="d-flex justify-content-center btn-container  mt-0 mb-0">
                                <button type="submit" class="btn btn-theme" name="instrumentation">INSTRUMENTATION</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <br>
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