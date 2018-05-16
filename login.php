<html>
<head>
  <link rel ='stylesheet' href='css/bootstrap.css'>

</head>
<body style="background:#ffffff url(img/sfondoerror.jpg) no-repeat"  >
</body>

<?php

$username = $_POST['username'];
$password = $_POST['password'];

include('DBhelper.php');
$user= getnumber("select count(*) from clienti where username='$username' and password='$password' ");

if ( $user == 1)
{
  //echo "login eseguito";
  session_start();
  $_SESSION['logged']= true;
  $_SESSION['username']= $username;

  if (isset($_SESSION['logged']))
  {

  }

  header("Location: Catalogo.php");
}
else
{
  echo "Il login non è stato eseguito.";
  echo "<br>";
  echo "Riprovare";
}

?>

<html>
<body>
<head>

  <style>

a:link, a:visited
{
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

<ul>
  <li><a href = "login.html"> Login </a></li>
  <li><a href = "registrati.html"> Registrati </a></li>
  <li><a href = "index.html"> HomePage </a></li>
</ul>



</body>
</html>
