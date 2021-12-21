<?php
session_start();
session_destroy();
// Redirect to the login page:
echo "<p>Logout successful!</p>";
echo '<script type="text/javascript">setTimeout(function () {
    window.location.href = "login.php";}, 2000);</script>';
?>