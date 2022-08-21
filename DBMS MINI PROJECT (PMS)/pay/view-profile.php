<html>
<head>
        <title>PROFILE</title>
        <link rel="stylesheet" type="text/css" href="view-profile.css">
</head>
<body><ul style="margin:0px;padding:0px;list-style: none">
     <li><a href="emphome.html"><img src="home-icon.png"  width="40" height="40" class ="imag" ></a></li>
</ul>
    <center>
    <h1>YOUR PROFILE DETAILS</h1>
<div class="tab">
    <?php
    session_start();
    //VAR_DUMP($_SESSION);
    //echo $_SESSION['emp_id'];
    $conn = mysqli_connect("localhost", "root", "", "payroll");
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $eid=$_SESSION['emp_id'];
    $sql = "Select * from EMPLOYEE where EMP_ID = $eid";
    //VAR_DUMP($sql);
    $result = mysqli_query($conn,$sql);
    $display = mysqli_fetch_assoc($result);
    //print_r($display);
    echo '<table class= "content-table">
     <tr><td>ID </td><td>: '.$display['EMP_ID'].'</td></tr>
     <tr><td>NAME </td><td>: '.$display['ENAME'].'</td></tr>
     <tr><td>DATE OF BIRTH </td><td>: '.$display['DOB'].'</td></tr>
     <tr><td>GENDER </td><td>: '.$display['GENDER'].'</td></tr>
     <tr><td>ADDRESS </td><td>: '.$display['ADDRESS'].'</td></tr>
     <tr><td>CONTACT NO </td><td>: '.$display['CONTACT'].'</td></tr>
     <tr><td>EMAIL ID </td><td>: '.$display['EMAIL'].'</td></tr>
     <tr><td>DATE OF JOINING </td><td>: '.$display['DOB'].'</td></tr>
     <tr><td>DEPARTMENT </td><td>: '.$display['DEPARTMENT'].'</td></tr>
    </table>'

?>
</div>
<div>
    <button style="height: 50px;background:black;outline: none;color: white;font-size: 15px;border-radius: 10px;font-weight:bold;"><a href="profile-update.html" style="text-decoration:none">Click here to update details</a></button>
</div>
</body>
</html>
