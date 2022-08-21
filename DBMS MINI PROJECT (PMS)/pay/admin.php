<?php
  if(isset($_POST['submit']))
  {
    $servername="localhost";
    $username="root";
    $password="";
    $dbDatabase="payroll";
    //creating connection to dbDatabase
    $conn= new mysqli($servername,$username,$password,$dbDatabase);

    @$username = $_POST['username'];
    @$password = $_POST['password'];
    $query= "select * from admin where username ='$username'and password='$password'";
    $query_run=mysqli_query($conn,$query);

    if($query_run)
    {
      if(mysqli_num_rows($query_run)>0)
      {
        $row= mysqli_fetch_array($query_run,MYSQLI_ASSOC);
        print_r($row);
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        header("Location: adminhome.html");
      }else
      {
        echo 'incorrect credentials';
        header("Location: signin.html");

      }
    }

    }
    else {
        {echo '<script type="text/javascript">alert("Enter the details")</script>';
        header("Location: signin.html");}
    }
?>
