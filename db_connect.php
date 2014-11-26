<?php
// Open a connection to the database 
// (display an error if the connection fails) 
 $conn = mysqli_connect('', '', '') or die(mysqli_error($conn)); 
mysqli_select_db($conn, '') or die(mysqli_error($conn)); 
?>