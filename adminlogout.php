<?php
session_start();
unset($_SESSION['uname']);
unset($_SESSION['level']);
session_destroy();
header("Location:vieraskirja.html");
?>