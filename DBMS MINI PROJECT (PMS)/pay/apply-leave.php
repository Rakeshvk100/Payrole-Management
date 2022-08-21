<?php
session_start();
    if(isset($_POST['submit']))
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbDatabase = "payroll";
        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbDatabase);
print_r($_POST);
        $id = $_POST['id'];
        $noofdays= $_POST['noofdays'];
        $applydate = $_POST['applydate'];
        $fromdate= $_POST['fromdate'];
        $todate = $_POST['todate'];
        $leavetype= $_POST['leavetype'];
        $reason = $_POST['reason'];


        $sql = "insert into apply_leave(EMP_ID,NO_OF_DAYS,APPLICATION_DATE,FROM_DATE,TO_DATE,LEAVE_TYPE,REASON) values($id,$noofdays,'$applydate','$fromdate','$todate','$leavetype','$reason')";
          if(mysqli_query($conn, $sql))
          {
              echo "Records inserted successfully.";
              header("Location: emphome.html");
          }
          else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
          }
      }
 ?>
