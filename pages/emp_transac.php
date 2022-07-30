<?php
include'../includes/connection.php';
?>
            <?php
              $fname = $_POST['firstname'];
              $lname = $_POST['lastname'];
              $gen = $_POST['gender'];
              $email = $_POST['email'];
              $phone = $_POST['phonenumber'];
              $jobb = $_POST['jobs'];
              $hdate = $_POST['hireddate'];
              $site = $_POST['site'];
              
              
              
              mysqli_query($db,"INSERT INTO employee
                              ( FIRST_NAME, LAST_NAME,GENDER, EMAIL, PHONE_NUMBER, JOB_ID, HIRED_DATE, SITE)
                              VALUES 
							  ('{$fname}','{$lname}','{$gen}','{$email}','{$phone}','{$jobb}','{$hdate}','{$site}')");
              header('location:employee.php');
            ?>