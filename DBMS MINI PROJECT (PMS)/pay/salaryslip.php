<?php
    if(isset($_POST['submit']))
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbDatabase = "payroll";
        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbDatabase);

          $id = $_POST['id'];
          $monthlyallow = $_POST['monthlyallow'];
          $basic_pay = $_POST['basicpay'];
    	  $da = $_POST['da'];
          $ca = $_POST['ca'];
          $hra = $_POST['hra'];
          $food_allow = $_POST['foodallow'];
          $bonus = $_POST['bonus'];
          $provisional= $_POST['provisional'];
          $provident = $_POST['provident'];
          $insurance= $_POST['insurance'];

          //$total_earnings=$monthlyallow+$basic_pay+$da+$ca+$hra+$food_allow+$bonus;
          //$deductions=$provisional+$provident+$insurance;
          //$netpay=$total_earnings- $deductions;
          $sql = "insert into salary(EMP_ID,MONTHLY_ALLOWANCE,BASIC_PAY,DA,CA,HRA,FOOD_ALLOWANCE,BONUS,PROVISIONAL_TAX,PROVIDENT_FUND,INSURANCE) values ($id,$monthlyallow,$basic_pay,$da,$ca,$hra,$food_allow,$bonus,$provisional, $provident,$insurance)";
          if(mysqli_query($conn, $sql))
          {
              echo "Records inserted successfully.";
              header("Location: adminhome.html");
          }
          else
          {
              echo "ERROR: Could not able to execute $sql. ". mysqli_error($conn);
          }


      }
 ?>
