<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/main.js"></script>
<?php
include("dbconnect.php");
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit;
}

?>