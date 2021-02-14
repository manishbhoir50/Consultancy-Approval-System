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

?>