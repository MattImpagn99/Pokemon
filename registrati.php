<?php
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  include('DBhelper.php');
  $query= "insert into clienti (username, email, password) values ('$username', '$email' , '$password')";
  insert($query);
  echo "sei registrato con il tuo username: " . $username;
?>

<html>
<body>
  <br><br>
<body style="background:#ffffff url(img/sfondologin.jpg) no-repeat"  >
  <br>
  <a href = "Catalogo.php"> Catalogo </a>
  <br>
  <a href = "index.html"> HomePage </a>
</body>
</html>
