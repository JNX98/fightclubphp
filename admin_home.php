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

<a href="adminlogout.php">Logout</a> | <a href="admin_add.php">Add another admin</a> | <a href="show_admins.php">Show all admins</a>
<!--<p id="note"></p>-->

<?php

if (isset($_GET["delete"])){
	$delete=$_GET["delete"];
}

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");

if (isset($delete)){
	$sql="delete from fightclub_guestbook where id=?";
	$stmt=mysqli_prepare($yhteys, $sql);
	mysqli_stmt_bind_param($stmt, 'i', $delete);
	mysqli_stmt_execute($stmt);
}

$tulos=mysqli_query($yhteys, "select * from fightclub_guestbook");

echo "<table border='1'>
<tr>
<th>Id</th>
<th>Username</th>
<th>Comment</th>
<th>Email</th>
<th colspan='2'>Action</th>
</tr>";

while($rivi=mysqli_fetch_object($tulos)){
	echo "<tr>";
	echo "<td>$rivi->id</td> 
		<td>$rivi->name</td> 
		<td>$rivi->message</td> 
		<td>$rivi->email</td>";
	echo "<td><a href='admin_home.php?delete=$rivi->id' onclick='return deleteFunction()'>Delete</a></td>";
	echo "<td><a href='adminedit.php?edit=$rivi->id'>Edit</a></td><br>";
	echo "</tr>";
	}

echo "</table>";

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

?>
</body>
</html>
