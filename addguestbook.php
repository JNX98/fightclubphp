<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<title>Kiitokset palautteesta</title>
</head>
<body>

<?php

$name=$_POST["name"];
$email=$_POST["email"];
$message=$_POST["comment"];

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");

$sql="insert into fightclub_guestbook(name, email, message, timestamp) values(?, ?, ?, CURRENT_TIMESTAMP())";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $message);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);
?>

<?php
header("index.php");
exit;
?>

</body>
</html>