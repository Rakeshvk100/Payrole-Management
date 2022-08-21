<html>
    <head>
    <title>LEAVE DETAILS</title>
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
            <th>NO OF DAYS</th>
            <th>APPLICATION DATE</th>
            <th>FROM</th>
            <th>TO</th>
            <th>LEAVE TYPE</th>
            <th>REASON</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "payroll");
    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "Select * from APPLY_LEAVE";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            echo "<tr>
                <td><center>" . $row["EMP_ID"]. "</td>
                <td><center>" . $row["NO_OF_DAYS"]  . "</td>
                <td><center>" . $row["APPLICATION_DATE"]. "</td>
                <td><center>" . $row["TO_DATE"]	  . "</td>
                <td><center>" . $row["FROM_DATE"]  . "</td>
                <td><center>" . $row["LEAVE_TYPE"]. "</td>
                <td><center>" . $row["REASON"]    . "</td>
            </tr>";
        }
    echo "</table>";
    }
    else
    {
        echo "No such leave application.";
    }
    $conn->close();
    ?>
    </table>
</div>
</body>
</html>
