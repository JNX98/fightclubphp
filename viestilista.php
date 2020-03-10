<?php

if (isset($_POST["name"])){
    $name = $_POST["name"];
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
$ok=mysqli_select_db($conn, "trtkp19a3");
$sql = "select from fightclub_guestbook where name=?"; 
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $name);
mysqli_stmt_execute($stmt);
$tulos =mysqli_stmt_get_result($stmt);
print "<ul>";
while ($rivi=mysqli_fetch_object($tulos)){
    $date=date_create($rivi->timestamp);
    $pvm=date_format($date, "d.m.Y H:i");
    print "<li>Aika=$pvm Viesti=$rivi->message <a href='muokkaus.php?muokattava=".$rivi->id."'>Poista</a><br>";
}
print "</ol>";
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>