<?php
  include_once('../assets/php_modules/common_methods.php');
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


    <form action="getDept.php" method="post">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3  ">

                <div id="first" class=" col card" style="width:300px">
                    <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw7ZGrIlT-hI1PbeRPNFcWHXqWRjYtW22g0w&usqp=CAU" alt="Card image" style="width:85%">
                    <div class="card-body">
                        <h4 class="card-title">Computer Engineering</h4>
                        <p class="card-text">HOD Name.</p>
                        <button role="button" type='submit' class="btn btn-primary" name="computer">Internships</button>
                    </div>

                </div>

                <div id="second" class="col card" style="width:300px">
                    <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV7FNu9E3LfpCjjSMZnZ2KSs7fImBo-Pyogw&usqp=CAU" alt="Card image" style="width:85%">
                    <div class="card-body">
                        <h4 class="card-title">Information Technology</h4>
                        <p class="card-text">HOD Name.</p>
                        <button role="button" type='submit' class="btn btn-primary" name="IT">Internships</button>
                    </div>

                </div>

                <div id="third" class="col card" style="width:300px">
                    <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkzDCEOcH5-9Icesqf9uVlx70zR4y6IbRlfg&usqp=CAU" alt="Card image" style="width:85%">
                    <div class="card-body">
                        <h4 class="card-title">Electronics Engineering</h4>
                        <p class="card-text">HOD Name.</p>
                        <button role="button" type='submit' class="btn btn-primary" name="electronic">Internships</button>

                    </div>
                </div>

                <div id="four" class=" col card" style="width:300px">
                    <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT53bWPyBFYdE52BsQnCiZWPfAdBFvC8xpiBw&usqp=CAU" alt="Card image" style="width:85%">
                    <div class="card-body">
                        <h4 class="card-title">Electronics and Telecommunication Engineering</h4>
                        <p class="card-text">HOD Name.</p>
                        <button role="button" type='submit' class="btn btn-primary" name="entc">Internships</button>
                    </div>

                </div>

                <div id="five" class=" col card" style="width:300px">
                    <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpow0Ev0S0AnQoVw9N89Wqb94wWiaEF-2FBA&usqp=CAU" alt="Card image" style="width:85%">
                    <div class="card-body">
                        <h4 class="card-title">Instrumentation Engineering</h4>
                        <p class="card-text">HOD Name.</p>
                        <button role="button" type='submit' class="btn btn-primary" name="instrumentation">Internships</button>
                    </div>
                </div>

            </div>
        </div>
    </form>

</body>


</html>