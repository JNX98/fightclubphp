<?php

session_start();

$uname=$_POST['uname'];
$password=$_POST['password'];
$op=$_GET['op'];

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");



if($op=="loggedin"){
  $sql = mysqli_query($yhteys, "SELECT * FROM jenny19101_vieraskirja WHERE kayttajanimi='$uname' AND salasana=md5('$password')");
/*
  while($rivi=mysqli_fetch_array($sql)){
	print "x".$rivi['kayttajanimi']."x".$rivi['salasana'];
  }
*/


  if(mysqli_num_rows($sql)==1){
    $qry=mysqli_fetch_array($sql);
    $_SESSION['uname']=$qry['kayttajanimi'];
	if($qry['kayttajanimi']=="admin"){
		header("location:admin_home.php");
	}
	else {
		header("location:adminlogin.php");
	}

  }

}

else if($op=="out"){
  unset($_SESSION['uname']);
  header("location:vieraskirja.html");
}

?>