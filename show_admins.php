<?php
session_start();
if($_SESSION['level']!="admin"){
	die("Sivu vaatii ylläpitovaltuudet.");
}
?>

<html> 					<!-- ylläpitäjien tulostus ja poistaminen -->
<head>
<link rel="stylesheet" type="text/css" href="style.css">

<title>Admins</title>

<script language="JavaScript" type="text/javascript">
function deleteFunction(){
	return confirm('Are you sure you wish to delete this admin?');
}
document.getElementById("note").innerHTML = txt;
</script>

</head>
<body>
<h2>Edit admin accounts</h2>
 <a href="admin_home.php"><button>Return</button></a>

<?php

if (isset($_GET["delete"])){
	$delete=$_GET["delete"];
}

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");

if (isset($delete)){
	$sql="delete from fightclub_admin where id=?";
	$stmt=mysqli_prepare($yhteys, $sql);
	mysqli_stmt_bind_param($stmt, 's', $delete);
	mysqli_stmt_execute($stmt);
}

$tulos=mysqli_query($yhteys, "select * from fightclub_admin");

echo "<table border='1'>
<tr>
<th>Admin name</th>
<th>Email</th>
<th>Level</th>
<th colspan='2'>Action</th>
</tr>";

while($rivi=mysqli_fetch_object($tulos)){
	echo "<tr>";
	echo "<td>$rivi->admin_name</td> 
		<td>$rivi->admin_email</td> 
		<td>$rivi->level</td>";
	echo "<td><a href='show_admins.php?delete=$rivi->id' onclick='return deleteFunction()'>Delete</a></td>";
	echo "<td><a href='edit_admins.php?edit=$rivi->id'>Edit</a></td><br>";
	echo "</tr>";
	}

echo "</table>";

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

?>
</body>
</html>
