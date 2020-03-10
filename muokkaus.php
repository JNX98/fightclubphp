<?php

if (isset($_GET["muokattava"])){
    $muokattava = $_GET["muokattava"];
}

if (!isset($muokattava)){
    header("Location:index.php");
}
// Create connnection
$conn=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
ok=mysqli_select_db($conn, "trtkp19a3");


$sql = "select * from  where id=?"; 
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $muokattava);
mysqli_stmt_execute($stmt);
$tulos =mysqli_stmt_get_result($stmt);
if ($rivi=mysqli_fetch_object($tulos)){
?>
<h2>Päivitä tiedot</h2>
<form action="muutos.php" method="post">
<input type="hidden" name="id"value='<?php print $rivi->id?>'><br>
Muokattava viesti: <input type="text" name="message"value='<?php print $rivi->message?>'><br>
<input type="submit" name="lähetä" value="ok">
</form>
</article>
</body>
<?php    
}
mysqli_close($conn);
?>