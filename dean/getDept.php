<?php
          $Department='';
          if (isset($_POST['IT'])) {
              $Department= 'IT';
          }
          else if(isset($_POST['computer'])) {
            $Department= 'computer';
          }
          else if(isset($_POST['instrumentation'])) {
              $Department= 'instrumentation';
          }
          else if(isset($_POST['entc'])) {
              $Department= 'entc';
          }
          else if(isset($_POST['electronic'])) {
              $Department= 'electronic';
          }

          session_start();
          $_SESSION['dept']=$Department;
          header("location:dept.php");

?>