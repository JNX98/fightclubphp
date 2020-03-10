<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"> <!--Ääkköset! -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="stylesheet.css"><!--Tähän css:n linkki kun se on olemassa -->



<title>Fightclub Guesbook</title>

</head>
<body>
<header>


<div class="card bg-dark text-white">
<img src="phpBanner.svg" class="card-img" alt="page header image">
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Tervetuloa vieraskirjaan!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="guestbook.php">Uusi viesti <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="muokkaa.html">Muokkaa viestejäsi</a><!--Tähän muokkaussivun linkki kun se on käytettävissä.-->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminlogin.php">Ylläpitoon kirjautuminen</a>
      </li>
    </ul>
  </div>
</nav>
</header>
<br>

<!-- Sivun sisältö articlen alaisuudessa.-->
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

<!--Tulostaa vieraskirjan kokonaisuudessaan. Eli tulostaa timestampin, viestin ja nimimerkin.-->
<table  background= "FightClubTable.png">
    <tr  background= phpGuestBack.svg>
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


</body>
<footer><h4>© fightclub 2020</h4></footer>
</html>
