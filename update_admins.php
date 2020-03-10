<?php

			//Ylläpitäjien tietojen päivitys

$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok = mysqli_select_db($yhteys, "trtkp19a3");

$sql="update fightclub_admin set admin_name=?, admin_email=?, admin_pw=md5(?) where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'sssi', $name, $email, $password, $id);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

?>
<?php
header("Location:show_admins.php");
exit;
?>