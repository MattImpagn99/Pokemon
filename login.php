
<?php

$username = $_POST['username'];
$password = $_POST['password'];

include('DBhelper.php');
$user= getnumber("select id from clienti where username='$username' and password='$password' ");

if ( $user == 1)
{
  header("Location: Catalogo.php");
}
else
{
  echo "Spiacenti ma il login non è stato eseguito.";
  echo "<br>";
  echo "Riprovare";
}

?>
<html>
<body>
  <br>
  <br>

<head>
<style>
a:link, a:visited {
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}

a:hover, a:active
{
    background-color: red;
}
</style>
</head>
<a href="login.html">Login</a> <br>
<a href = "registrati.html"> Registrati </a> <br>
<a href = "index.html"> HomePage </a> <br>

</body>
</html>
