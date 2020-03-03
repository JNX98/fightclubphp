<?php
session_start();
if($_SESSION['uname']!="admin"){
	die("Sivu vaatii ylläpitovaltuudet.");
}
?>

<html>
<head>
<title>Admin Home</title>
</head>
<body>
<h2>Welcome Admin!</h2>
<p>
<a href="logout.php">Logout</a>
</p>

</body>
</html>
