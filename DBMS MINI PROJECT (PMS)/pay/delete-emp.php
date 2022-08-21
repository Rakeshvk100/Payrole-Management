<?php
    if(isset($_POST['submit']))
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbDatabase = "payroll";
        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbDatabase);
        $id = $_POST['username'];
        //$department = $_POST['text'];
        $sql ="delete from profile where EMP_ID='$id'";
        if(mysqli_query($conn, $sql))
        {
              echo " Records deleted successfully.";
              header("Location: adminhome.html");
          }
          else
          {
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
          }
      }
 ?>
