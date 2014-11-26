<?php
require_once 'db_connect.php';
if (isset($_POST['name'])) {
	mysqli_query($conn, "INSERT INTO `fijifinance`.`grads` (`name`, `email`, `message`, `day`) VALUES ('" . mysqli_real_escape_string($conn, $_POST['name']) . "', '" 
	. mysqli_real_escape_string($conn, $_POST['email']) . "', '" . mysqli_real_escape_string($conn, $_POST['message']) . "', '" . mysqli_real_escape_string($conn, $_POST['day']) . "');") or die(mysqli_error($conn));
}
mysqli_close($conn);
header("Location: /FIJIFinance");
?>