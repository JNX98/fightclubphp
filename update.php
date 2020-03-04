<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Updation </title>
<style>
		input{
		width: 40%;
		height: 5%;
		border: 1px;
		border-radius: 05px;
		padding: 8px 15px 8px 15px;
		margin: 10px 0px 15px 0px;
	} 

</style>			
</head>
<body>
	<center>
	<h1> Päivitys tietokantaan </h1>

	<form action="" method="POST">
		
		<input type="text" name="name" placeholder="Name"/><br/>
		<input type="text" name="email" placeholder="email"/><br/>
		<input type="text" name="message" placeholder="message"/><br/>
		
		<input type="submit" name="update" value="Paivita tiedot"/>
	</form>
	</center>
</body>
</html>

<?php
$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");
mysql_query ('SET NAMES UTF8;');
mysql_query ('SET COLLATION_CONNECTION=utf8_general_ci;');
mysql_client_encoding($conn);// where $conn is your connection

if(isset($_POST['id']));

