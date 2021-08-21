<?php
include("../assets/php_modules/common_methods.php");
include("../assets/php_modules/form_details.php");

// internship_id and sdrn are through href you can see them in url 
$internship_id = $_GET['internship_id'];
$document = get_document_details($internship_id);
$form = get_form_details($internship_id);

if (isset($_POST['quotation'])) {
    header('Location:../assets/php_modules/form_download.php?id=' . $internship_id);
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

        <!-- external javascript link -->
        <script src="../assets/js/main.js"></script>

        <form method="post">
            <div class="mb-3  d-flex justify-content-start mt-4 btn-container">
                <button type="submit" name="quotation" class="btn text-decoration-none">Download Quotation Letter</button>
            </div>
        </form>

        <form method="post" enctype="multipart/form-data">

            <?php
            // to get basename of file
            $acceptance = $document['acceptance'];
            $payment = $document['payment'];
            $file1 = pathinfo($acceptance);
            $file2 = pathinfo($payment);
            $basename1 = $file1['basename'];
            $basename2 = $file2['basename'];
            ?>

            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Acceptance letter</label>
                <a class="form-control text-decoration-none" href="<?php echo $acceptance ?>" target="_blank"><?php echo $basename1 ?></a>                
                <small class="text-muted">Note: Only Pdf file is allowed </small>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Payment receipt</label>
                <a class="form-control text-decoration-none" href="<?php echo $payment ?>" target="_blank"><?php echo $basename2 ?></a>
                <small class="text-muted">Note: Only Pdf file is allowed </small>

            </div>


        </form>
    </div>

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