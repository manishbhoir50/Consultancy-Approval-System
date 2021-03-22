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

  <!-- external css -->
  <link rel="stylesheet" href="../css/style.css">
  <title>login</title>
</head>

<body class="india-blue">
  <!-- login form -->
  <div class="admin-log mx-auto">
    <i class="fas fa-user img-fluid"></i>
  </div>
  <div class="login-form w-80 mx-auto mt-25">
    <form method="POST">
      <div class="input-group flex-nowrap w-80 mx-auto mb-3">
        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
        <input type="text" class="form-control" placeholder="email id" aria-label="Username" aria-describedby="addon-wrapping" name="email_id" value="<?php if (isset($email_id)) echo $email_id ?>">
      </div>
      <div class="input-group flex-nowrap w-80 mx-auto mb-3">
        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-key"></i></span>
        <input type="password" class="form-control" placeholder="password" aria-label="Username" aria-describedby="addon-wrapping" name="password">
      </div>
      <div class="form-check w-80 mx-auto mb-3">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          show password
        </label>
      </div>
      <div class="input-group flex-nowrap w-80 mx-auto mb-3">
        <input type="submit" class="form-control btn btn-success" value="login" name="submit">
      </div>
    </form>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php
include_once("../assets/php_modules/connection.php");
include_once("../assets/php_modules/common_methods.php");

// on clicking login button this code will redirect to home.php
if (isset($_POST['submit'])) {


  //session is started
  session_start();
  $email_id = $_POST['email_id'];
  $password = $_POST['password'];
  $_SESSION['log_in'] = 1;

  // query to fetch details of user with given email id and password
  $query = "SELECT * FROM `admin_details` WHERE  `Email_id` = '$email_id'AND `password` = '$password' AND `role` = 'Dean'";
  $result = mysqli_query($conn, $query);
  // echo mysqli_error($conn);

  // if we found 0 records with given email id and password then pop up will come
  if ($result) {
    if (mysqli_num_rows($result) == 0) {
?>
      <script>
        alert("Wrong email id or password");
      </script>
<?php
    } else {
      /* $query = "SELECT * FROM `faculty` WHERE `Email` = '$email_id' AND `Password` = '$password'";
      $result = mysqli_query($conn, $query);
      $data = mysqli_fetch_assoc($result);
      $sdrn = $data["Sdrn"];
      $dept = $data['Department'];
      $_SESSION['dept'] = $dept;
      $_SESSION['sdrn'] = $sdrn;
      $_SESSION['email_id'] = $email_id;*/
      $_SESSION['start_date'] = "2001-01-01";
      $_SESSION['end_date'] = display_date();
      $_SESSION['status'] = 'all';
      $_SESSION['first_name'] = 'Dean';
      $_SESSION['role'] = 'Dean';
      header("location: ./home.php");
    }
  }
}
?>