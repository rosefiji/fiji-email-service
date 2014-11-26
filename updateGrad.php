<?php
require_once 'db_connect.php';
if (isset($_POST['name'])) {
	mysqli_query($conn, "UPDATE grads SET email='" . mysqli_real_escape_string($conn, $_POST['email'])  . "', message='" . mysqli_real_escape_string($conn, $_POST['message'])  . 
	"', day='" . $_POST['day'] . "' WHERE name='" . mysqli_real_escape_string($conn, $_POST['name'])  . "'");
}
mysqli_close($conn);
header("Location: /FIJIFinance");
?>