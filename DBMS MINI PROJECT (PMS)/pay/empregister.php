<?php

if(isset($_POST['submit'])){
$servername = "localhost";
$username = "root";
$password = "";
 $dbDatabase = "payroll";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbDatabase);

  $id = $_POST['id'];
	$name = $_POST['name'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$doj = $_POST['doj'];
	$email = $_POST['email'];
  $department = $_POST['department'];
	$pwd = $_POST['password'];
  $cpwd=$_POST['cpassword'];

if($pwd==$cpwd) {

$sql = "insert into EMPLOYEE(EMP_ID,ENAME,DOB,ADDRESS,GENDER,CONTACT,EMAIL,DOJ,DEPARTMENT,PASSWORD,CONFIRM_PASSWORD) values ('$id', '$name', '$dob', '$address','$gender', $contact, '$email', '$doj', '$department','$pwd','$cpwd')";
  if(mysqli_query($conn, $sql)){
      echo "Records inserted successfully.";
      header("Location: adminhome.html");
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }
}else {
  echo '<script type="text/javascript">alert("Please ConfirmPassword")</script>';
}
  }
 ?>
