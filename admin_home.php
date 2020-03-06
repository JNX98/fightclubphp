<?php
session_start();
if($_SESSION['level']!="admin"){
	die("Sivu vaatii ylläpitovaltuudet.");
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Admin Home</title>

<script language="JavaScript" type="text/javascript">
function deleteFunction(){
	var txt;
	return confirm('Delete this comment?');
	txt="Comment deleted";
}
document.getElementById("note").innerHTML = txt;
</script>

</head>
<body>
<h2>Welcome Admin!</h2>

<a href="adminlogout.php">Logout</a>
<p id="note"></p> <!--tämä ei nyt jostakin syystä toimi-->

<?php

if (isset($_GET["delete"])){
	$delete=$_GET["delete"];
}

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");

if (isset($delete)){
	$sql="delete from jenny19101_vieraskirja where id=?"; //muutettava!!
	$stmt=mysqli_prepare($yhteys, $sql);
	mysqli_stmt_bind_param($stmt, 'i', $delete);
	mysqli_stmt_execute($stmt);
}

$tulos=mysqli_query($yhteys, "select * from jenny19101_vieraskirja"); //muutettava!!

echo "<table border='1'>
<tr>
<th>Id</th>
<th>Username</th>
<th>Comment</th>
<th>Email</th>
<th>Action</th>
</tr>";
//alla olevat muutettava!!
while($rivi=mysqli_fetch_object($tulos)){
	echo "<tr>";
	echo "<td>$rivi->id</td>
		<td>$rivi->kayttajanimi</td> 
		<td>$rivi->kommentti</td> 
		<td>$rivi->email</td>";
	echo "<td><a href='admin_home.php?delete=$rivi->id' onclick='return deleteFunction()'>Poista</a></td>";
	echo "<td><a href='adminedit.php?edit=$rivi->id'>Muokkaa</a></td><br>";
	echo "</tr>";
	}

echo "</table>";

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

?>
</body>
</html>
