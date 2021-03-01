<!DOCTYPE html>
<html lang="en">

<head>
    <title>Principle</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <div class="main-header">
            <div class="container-fluid main_menu">
                <div class="row no-gutters">
                    <div class="col-md-10 col-12 mx-auto">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">


                                <!-- RAIT Internship -->
                                <a class="navbar-brand" href="#">RAIT Internship</a>


                                <!-- menu on right side -->
                                <form class="d-flex form-width justify-content-between">

                                    <!-- apply button -->


                                    <!-- profile -->
                                    <div class="d-flex align-items-center justify-content-between profile-container">
                                        <div class="profile d-flex justify-content-center align-items-end">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <span>Dean</span>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <form action="getDept.php" method="post">
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3  ">

            <div id="first" class=" col card" style="width:300px">
                <img class="card-img-top"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw7ZGrIlT-hI1PbeRPNFcWHXqWRjYtW22g0w&usqp=CAU"
                    alt="Card image" style="width:85%">
                <div class="card-body">
                    <h4 class="card-title">Computer Engineering</h4>
                    <p class="card-text">HOD Name.</p>
                    <button role="button" type='submit' class="btn btn-primary" name="computer">Internships</button>
                </div>

            </div>

            <div id="second" class="col card" style="width:300px">
                <img class="card-img-top"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV7FNu9E3LfpCjjSMZnZ2KSs7fImBo-Pyogw&usqp=CAU"
                    alt="Card image" style="width:85%">
                <div class="card-body">
                    <h4 class="card-title">Information Technology</h4>
                    <p class="card-text">HOD Name.</p>
                    <button role="button" type='submit' class="btn btn-primary" name="IT">Internships</button>
                </div>

            </div>

            <div id="third" class="col card" style="width:300px">
                <img class="card-img-top"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkzDCEOcH5-9Icesqf9uVlx70zR4y6IbRlfg&usqp=CAU"
                    alt="Card image" style="width:85%">
                <div class="card-body">
                    <h4 class="card-title">Electronics Engineering</h4>
                    <p class="card-text">HOD Name.</p>
                    <button role="button" type='submit' class="btn btn-primary" name="electronic">Internships</button>

                </div>
            </div>

            <div id="four" class=" col card" style="width:300px">
                <img class="card-img-top"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT53bWPyBFYdE52BsQnCiZWPfAdBFvC8xpiBw&usqp=CAU"
                    alt="Card image" style="width:85%">
                <div class="card-body">
                    <h4 class="card-title">Electronics and Telecommunication Engineering</h4>
                    <p class="card-text">HOD Name.</p>
                    <button role="button" type='submit' class="btn btn-primary" name="entc">Internships</button>
                </div>

            </div>

            <div id="five" class=" col card" style="width:300px">
                <img class="card-img-top"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQpow0Ev0S0AnQoVw9N89Wqb94wWiaEF-2FBA&usqp=CAU"
                    alt="Card image" style="width:85%">
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
