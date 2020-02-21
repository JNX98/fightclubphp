<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href=""><!--Tähän css:n linkki kun se on olemassa-->
<title>Fightclub Guesbook</title>
</head>
<body>
<header>
<h2>Tervetuloa vieraskirjaan!</h2>
<br>
<nav>
<a href="guestbook.php">Uusi viesti</a>
<a href="#">Muokkaa viestejäsi</a><!--Tähän muokkaussivun linkki kun se on käytettävissä-->
<a id="admin" href="#">Ylläpitoon kirjautuminen</a><!--Tähän kirjautumisen linkki kun se on käytettävissä, tein tälle oman id:n jotta tästä voi tehdä eri näköisen CSS:llä-->
</nav>
</header>
<br>
<article>
<?php
// Create connection
$conn=mysqli_connect("127.0.1", "trtkp19a3", "trtkp19a3");
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$ok=mysqli_select_db($conn, "trtkp19a3"); 
$tulos=mysqli_query($conn, "SELECT * FROM fightclub_guestbook");
?>
<table>
    <tr>
        <th>Aika</th>
        <th>Viesti</th>
        <th>Nimimerkki</th>
    </tr>
<?php while ($rivi=mysqli_fetch_object($tulos)){ ?>
<tr>
<td><?php echo $rivi->timestamp; ?> </td>
<td><?php echo $rivi->message; ?> </td>
<td><?php echo $rivi->name; ?> </td>
</tr>
<?php } ?>
</table>
</article>
<br>
<footer><h4>© fightclub 2020</h4></footer>
</body>
</html>