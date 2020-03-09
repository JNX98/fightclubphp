<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<title>Admin login</title>
</head>
<body>
<h2>Admin Login</h2>
<form action='./login.php?op=loggedin' method='POST'>
User name: <input type='text' name='uname' value=''><br>
Password: <input type='password' name='password' value=''><br>
<input type='submit' value='Login'>
</form>
<a href="./vieraskirja.php"><button>Return</button></a> <!--tulee pitää formin ulkopuolella / korjattava: linkin johdettava etusivulle -->
</body>
</html>