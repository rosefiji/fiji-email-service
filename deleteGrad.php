<?php
require_once 'db_connect.php';
if (isset($_POST['name'])) {
	mysqli_query($conn, "DELETE FROM grads WHERE name='" . $_POST['name'] . "'");
}
mysqli_close($conn);
header("Location: /FIJIFinance");
?>