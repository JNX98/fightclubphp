<?php

//Uusien ylläpitäjien lisäys

$admin_name=$_POST["name"];
$admin_email=$_POST["email"];
$admin_pw=$_POST["password"];


$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");

$sql="insert into fightclub_admin(admin_name, admin_email, admin_pw, level) values(?, ?, md5(?), 'admin')";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $admin_name, $admin_email, $admin_pw);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);
?>

<?php
header("Location:admin_home.php");
exit;
?>
