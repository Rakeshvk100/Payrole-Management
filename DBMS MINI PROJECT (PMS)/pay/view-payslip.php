<html>
<head>
        <title>PAYSLIP</title>
        <link rel="stylesheet" type="text/css" href="view-profile.css">
</head>
<body><ul style="margin:0px;padding:0px;list-style: none">
     <li><a href="emphome.html"><img src="home-icon.png"  width="40" height="40" class ="imag" ></a></li>
</ul>
    <center>
    <h1>YOUR PAYSLIP</h1>
<div class="tab">
    <?php
    session_start();

    //echo $_SESSION['emp_id'];
    $conn = mysqli_connect("localhost", "root", "", "payroll");
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    //print_r($_SESSION);
    $eid=$_SESSION['emp_id'];
    $sql = "Select * from PAYSLIP where EMP_ID = $eid ";
    //VAR_DUMP($sql);
    $result = mysqli_query($conn,$sql);
    if($result)
    {
    $display = mysqli_fetch_assoc($result);
    if($display){
    //print_r($display);
    echo '<table class= "content-table">
     <tr><td>ID </td><td>: '.$display['EMP_ID'].'</td></tr>

     <tr><td>MONTHLY ALLOWANCE </td><td>:'.$display['MONTHLY_ALLOWANCE'].'</td></tr>
     <tr><td>BASIC PAY </td><td>: '.$display['BASIC_PAY'].'</td></tr>
     <tr><td>DEARNESS ALLOWANCE</td><td>: '.$display['DA'].'</td></tr>
     <tr><td>CONVEYANCE ALLOWANCE</td><td>: '.$display['CA'].'</td></tr>
     <tr><td>HOUSE RENT ALLOWANCE</td><td>: '.$display['HRA'].'</td></tr>
     <tr><td>FOOD ALLOWANCE</td><td>: '.$display['FOOD_ALLOWANCE'].'</td></tr>
     <tr><td>TOTAL EARNINGS</td><td>: '.$display['BONUS'].'</td></tr>
     <tr><td>PROVISIONAL TAX</td><td>: '.$display['PROVISIONAL_TAX'].'</td></tr>
     <tr><td>PROVIDENT FUND</td><td>: '.$display['PROVIDENT_FUND'].'</td></tr>
     <tr><td>INSURANCE</td><td>: '.$display['INSURANCE'].'</td></tr>
     <tr><td>TOTAL EARNINGS</td><td>: '.$display['TOTAL_EARNINGS'].'</td></tr>
     <tr><td>TOTAL DEDUCTIONS</td><td>: '.$display['DEDUCTIONS'].'</td></tr>
     <tr><td>YOUR NETPAY</td><td>: '.$display['NET_PAY'].'</td></tr>

    </table>';}
    else
    {
        echo'<br><h3>------ No payslip generated ------</h2>';
    }
   }
    else
    {
            echo"Database error";
    }

?>
</div>
</body>
</html>
