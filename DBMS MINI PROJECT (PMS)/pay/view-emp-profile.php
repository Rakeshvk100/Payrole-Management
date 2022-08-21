<html>
    <head>
        <title>EMPLOYEE DETAILS</title>
        <link rel="stylesheet" type="text/css" href="tablecss.css">
    </head>
    <body>
        <ul style="margin:0px;padding:0px;list-style: none">
             <li><a href="adminhome.html"><img src="home-icon.png"  width="40" height="40" class ="imag" ></a></li>
        </ul>
        <center>
        <table class="content-table">
                <tr>
                    <th>EMP ID</th>
                    <th>EMP NAME</th>
                    <th>DOB</th>
                    <th>ADDRESS</th>
                    <th>GENDER</th>
                    <th>CONTACT NO</th>
                    <th>EMAIL ID</th>
                    <th>DOJ</th>
                    <th>DEPARTMENT</th>
                </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "payroll");
            // Check connection
            if ($conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "select * from PROFILE";
            $result = $conn->query($sql);
            if ($result -> num_rows > 0)
            {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                	// echo $row;
                   echo "<tr>
                        <td><center>" . $row["EMP_ID"]. "</td>
                        <td><center>" . $row["ENAME"] . "</td>
                        <td><center>" . $row["DOB"] . "</td>
                        <td><center>" . $row["ADDRESS"]  . "</td>
                        <td><center>" . $row["GENDER"]  . "</td>
                        <td><center>" . $row["CONTACT"]. "</td>
                        <td><center>" . $row["EMAIL"]  . "</td>
                        <td><center>" . $row["DOJ"]  . "</td><td>
                        <center>" . $row["DEPARTMENT"]  . "</td>
                    </tr>";
                }
                echo "</table>";
            }
            else { echo "Currently no members."; }
            $conn->close();
            ?>
            </table>
        </body>
	</html>
