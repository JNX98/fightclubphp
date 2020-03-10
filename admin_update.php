<?php

			//Käyttäjien viestien päivitys

$message=$_POST["comment"];
$id=$_POST["id"];

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok = mysqli_select_db($yhteys, "trtkp19a3");

$sql="update fightclub_guestbook set message=? where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'si', $message, $id);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

?>
<?php
header("Location:admin_home.php");
exit;
?>