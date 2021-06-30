<header class="position-sticky">

    <?php
        session_start();
        if(isset($_POST['log-out'])){
            log_out();
         }
    ?>
    <!-- college logo and name -->
    <div class="collge-header d-flex align-items-center">
        <div class="college-logo">
            <img src="../assets/images/logo.jpeg" alt="dy patil logo" id="college-logo">
        </div>
        <div class="college-name add-font">
            <h1 class="text-center" id="college-name">RAMRAO ADIK INSTITUTE OF TECHNOLOGY</h1>
        </div>
    </div>

    <!-- actual navbar red colored -->
    <div class="main-header" style="position : sticky !important; top : 0px !important">
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
                                        <a class="btn btn-light mr-2 hide-me" href="#">Apply</a>

                                        <!-- log out button -->
                                        <button class="btn btn-light" href="#" type="submit" name="log-out">Log out</button>
                                    </div>

                                    <!-- profile -->
                                    <div class="d-flex align-items-center justify-content-center profile-container">
                                        <div class="profile d-flex justify-content-center align-items-end" style = "margin-right : 5px">
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
