<!DOCTYPE html>
<html>
<head>
<title>Edit a comment</title>
</head>
<body>
<!-- Ylläpidon käyttäjien muokkaus -->
<?php
if (isset($_GET["edit"])){
	$edit=$_GET["edit"];
}

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok = mysqli_select_db($yhteys, "trtkp19a3");

$sql="select * from fightclub_guestbook where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'i', $edit);
mysqli_stmt_execute($stmt);
$tulos=mysqli_stmt_get_result($stmt);

if ($rivi=mysqli_fetch_object($tulos)) {
?>
<form action='admin_update.php' method='post'>

id: <input type='text' name='id' value='<?php print $rivi->id;?>' readonly><br>
Username: <input type='text' name='uname' value='<?php print $rivi->name;?>' readonly><br>
Comment: <textarea name='comment'><?php print $rivi->message;?></textarea><br>
<input type='submit' name='ok' value='Update'>
</form>

<?php
}
?>
</body>
</html>