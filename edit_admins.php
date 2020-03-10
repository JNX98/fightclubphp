<?php
session_start();
if($_SESSION['level']!="admin"){
	die("Sivu vaatii yll�pitovaltuudet.");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit a comment</title>
</head>
<body>
<h2>Edit an admin</h2>

		<!-- Ylläpitäjien tietojen päivitys -->

<?php
if (isset($_GET["edit"])){
	$edit=$_GET["edit"];
}

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok = mysqli_select_db($yhteys, "trtkp19a3");

$sql="select * from fightclub_admin where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 's', $edit);
mysqli_stmt_execute($stmt);
$tulos=mysqli_stmt_get_result($stmt);

if ($rivi=mysqli_fetch_object($tulos)) {
?>
<form action='update_admins.php' method='post'>

Id: <input type='text' name='id' value='<?php print $rivi->id;?>' readonly><br>
Name: <input type='text' name='name' value='<?php print $rivi->admin_name;?>'><br>
Email: <input type='text' name='email' value='<?php print $rivi->admin_email;?>'><br>
New password: <input type='password' name='password' value=''><br>
<input type='submit' name='ok' value='Update'><a href="show_admins.php"><button>Cancel</button></a>
</form>

<?php
}
?>
</body>
</html>