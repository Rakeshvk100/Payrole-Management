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
        $id=$_POST['emp_id'];
        $password=$_POST['password'];
        $query = "select emp_id,password from employee where emp_id='$id' and password='$password' ";
        $query_run = mysqli_query($conn,$query);
        if($query_run)
        {
              if(mysqli_num_rows($query_run)>0)
              {
                  $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                  $_SESSION['emp_id'] = $id;
                  $_SESSION['password'] = $password;
                  header( "Location: emphome.html");
              }
              else
              {
                echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
              }
        }
        else
        {
             echo '<script type="text/javascript">alert("Database Error")</script>';
        }
    }
?>
