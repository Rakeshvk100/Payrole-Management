<html>
    <head>
        <title>SALARY DETAILS</title>
        <link rel="stylesheet" type="text/css" href="tablecss.css">
    </head>
    <body>
        <ul style="margin:0px;padding:0px;list-style: none">
             <li><a href="adminhome.html"><img src="home-icon.png"  width="40" height="40" class ="imag" ></a></li>
        </ul>
        <center>
    	<table class="content-table">
            <tr>
                <th>ID</th>
                <th>MONTHLY ALLOWANCE</th>
                <th>BASIC PAY</th>
                <th>DA</th>
                <th>CA</th>
                <th>HRA</th>
                <th>FOOD ALLOWANCE</th>
                <th>BONUS</th>
                <th>PROVISIONAL TAX</th>
                <th>PROVIDENT FUND</th>
                <th>INSURANCE</th>
                <th>TOTAL EARNINGS</th>
                <!-- <th>DEDUCTIONS</th>
                <th>NET PAY</th> -->
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "payroll");
            // Check connection
            if ($conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "Select * from PAYSLIP";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                    echo "<tr>
                            <td><center>" . $row["EMP_ID"]. "</td>
                            <td><center>" . $row["MONTHLY_ALLOWANCE"]. "</td>
                            <td><center>" . $row["BASIC_PAY"]  . "</td>
                            <td><center>" . $row["DA"]. "</td>
                            <td><center>" . $row["CA"]  . "</td>
                            <td><center>" . $row["HRA"]  . "</td>
                            <td><center>" . $row["FOOD_ALLOWANCE"]. "</td>
                            <td><center>" . $row["BONUS"]  . "</td>
                            <td><center>" . $row["PROVISIONAL_TAX"]. "</td>
                            <td><center>" . $row["PROVIDENT_FUND"]  . "</td>
                            <td><center>" . $row["INSURANCE"]  ."</td>
                            <td><center>" . $row["TOTAL_EARNINGS"]  ."</td>
                            <td><center>" . $row["DEDUCTIONS"]  ."</td>
                            <td><center>" . $row["NET_PAY"]  ."</td>
                        </tr>";
                }
                echo "</table>";
            }
            else { echo "Currently no salary details."; }
            $conn->close();
            ?>
        </table>
    </body>
</html>
