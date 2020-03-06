<?php

session_start();

$uname=$_POST['uname'];
$password=$_POST['password'];
$op=$_GET['op'];

$yhteys=mysqli_connect("127.0.0.1", "trtkp19a3", "trtkp19a3");
$ok=mysqli_select_db($yhteys, "trtkp19a3");


if($op=="loggedin"){
  $sql = mysqli_query($yhteys, "SELECT * FROM jenny19101_admin WHERE admin_name='$uname' AND admin_pw=md5('$password')");
//ylläpitotunnukset oltava omassa tkannassaan, muuten ne voidaan poistaa admin_home-sivulla

  if(mysqli_num_rows($sql)==1){
    $qry=mysqli_fetch_array($sql);
    $_SESSION['uname']=$qry['admin_name'];
    $_SESSION['level']=$qry['level'];
	if($qry['level']=="admin"){
		header("location:admin_home.php");
	}
	/*else {
		header("location:adminlogin.php");
	}
	*/
  }
else{
        ?>
        <script language="JavaScript">
            alert('Username or password incorrect.');
            document.location='adminlogin.php';
        </script>
        <?php
    }

}

else if($op=="out"){
  unset($_SESSION['uname']);
  unset($_SESSION['level']);
  header("location:vieraskirja.html");
}

?>