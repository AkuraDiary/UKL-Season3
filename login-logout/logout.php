<?php
session_start();
session_destroy();
header("location: ../login-logout/login.php");
?>