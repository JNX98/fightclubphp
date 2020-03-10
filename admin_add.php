<?php
session_start();
if($_SESSION['level']!="admin"){
	die("Sivu vaatii ylläpitovaltuudet.");
}
?>
<!DOCTYPE html>
<html> <!-- Uusien ylläpitäjien lisäysformi -->
<head>
 <meta charset="UTF-8">
<title>Add an Admin</title>
</head>
<body>
<h2>Add another admin</h2>
<form action='./add_admin.php' method='post'>
Name: <input type='text' name='name' value=''><br>
Email: <input type='text' name='email' value=''><br>
Password: <input type='password' name='password' value=''><br>
<p><input type='submit' name='ok' value='Send'><a href="admin_home.php"><button>Return</button></a></p>
</form>

</body>
</html>