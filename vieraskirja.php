<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<title>Kiitokset palautteesta</title>
</head>
<body>

<?php

$name=$_POST["nimi"]; // lomakkeelta tulevat muuttujat muutettava
$email=$_POST["email"];
$message=$_POST["comment"];
//$salasana=$_POST["salasana"];

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");

//mikä tässä alla olevassa heittää?
$sql="insert into fightclub_guestbook(name, email, message, timestamp) values(?, ?, ?, CURRENT_TIMESTAMP())";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $message, $timestamp);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);
?>

<?php
header("Location:vieraskirja.html"); // muutettava!!
exit;
?>

</body>
</html>