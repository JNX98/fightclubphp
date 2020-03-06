<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href=""><!--TÃ¤hÃ¤n css:n linkki kun se on olemassa-->
<title>Fightclub Guesbook</title>
</head>
<body>
<header>
<h2>Tervetuloa vieraskirjaan!</h2>
<br>
<nav>
<a href="guestbook.php">Uusi viesti</a>
<a href="#">Muokkaa viestejÃ¤si</a><!--TÃ¤hÃ¤n muokkaussivun linkki kun se on kÃ¤ytettÃ¤vissÃ¤-->
<a id="admin" href="login.php">YllÃ¤pitoon kirjautuminen</a><!--TÃ¤hÃ¤n kirjautumisen linkki kun se on kÃ¤ytettÃ¤vissÃ¤, tein tÃ¤lle oman id:n jotta tÃ¤stÃ¤ voi tehdÃ¤ eri nÃ¤kÃ¶isen CSS:llÃ¤-->
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
<?php while ($rivi=mysqli_fetch_object($tulos)){ 
$date=date_create($rivi->timestamp);
?>
<tr>
<td><?php echo date_format($date, "d.m.Y H:i"); ?> </td>
<td><?php echo $rivi->message; ?> </td>
<td><?php echo $rivi->name; ?> </td>
</tr>
<?php } ?>
</table>
</article>
<br>
<footer><h4>Â© fightclub 2020</h4></footer>
</body>
</html>
