<!DOCTYPE html>
<html>
<head>
<title>Kiitokset palautteesta</title>
</head>
<body>

<?php

$kayttajanimi=$_POST["nimi"];
$email=$_POST["email"];
$kommentti=$_POST["comment"];
$salasana=$_POST["salasana"];

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");

$sql="insert into jenny19101_vieraskirja(kayttajanimi, email, kommentti, salasana) values(?, ?, ?, md5(?))";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ssss', $kayttajanimi, $email, $kommentti, $salasana);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);
?>
<?php
header("Location:vieraskirja.html");
exit;
?>
</body>
</html>