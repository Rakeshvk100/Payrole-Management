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
    $id=$_SESSION['emp_id'];
    if($_POST['newaddress']!="")
    {
        $newaddress= $_POST['newaddress'];
        $sql1 = "UPDATE employee SET ADDRESS = '$newaddress' WHERE EMP_ID = '$id' ";
        $result1=mysqli_query($conn,$sql1);
        if(!$result1)
        {
            die('Could not update data: '.mysqli_error($conn));

        }
        echo'Address updated Successfully!';
    }

    if($_POST['newcontact']!="")
    {
        $newcontact= $_POST['newcontact'];
        $sql2 = "UPDATE employee SET CONTACT = '$newcontact' WHERE EMP_ID = '$id' ";
        $result2=mysqli_query($conn,$sql2);
        if(!$result2)
        {
            die('Could not update data: '.mysqli_error($conn));

        }
        echo 'Contact updated Successfully!';
    }
    if($_POST['password']!="")
    {
        $newpassword= $_POST['newpwd'];
        $sql2 = "UPDATE employee SET PASSWORD = '$newpassword',CONFIRM_PASSWORD='$newpassword' WHERE EMP_ID = '$id' ";
        $result2=mysqli_query($conn,$sql2);
        if(!$result2)
        {
            die('Could not update data: '.mysqli_error($conn));

        }
        echo 'Password updated Successfully!';
    }
    header("Location: view-profile.php");
    mysqli_close($conn);
}
?>
