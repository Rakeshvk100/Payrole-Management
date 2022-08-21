<?php
if(isset($_POST['post']) or ($_POST['message']!= NULL))
{
    echo 'posted successfully';
    header("Location: signin.html");
}
else {
    die('dhjbfh');
    header("Location: contactus.html");
}
?>
