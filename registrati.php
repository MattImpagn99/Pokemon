<html>
<head>
  <link rel ='stylesheet' href='style.css'>
  <link rel ='stylesheet' href='css/bootstrap.css'>
</head>
<body style="background:#ffffff url(img/sfondologin.jpg) no-repeat"  >
  <?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    include('DBhelper.php');
    $query= "insert into clienti (username, email, password) values ('$username', '$email' , '$password')";
    insert($query);
    echo "<font color=#FF0000>La registrazione è avvenuta con successo. </font> <br> <br>";
    echo "<font color=#FF0000>Il tuo username è: " . $username. "</font>";
  ?>
  <br><br>
  <ul>
    <li><a href = "index.html"> HomePage </a></li>
    <li><a href = "login.html"> Login </a></li>
    <li><a href = "Catalogo.php">Catalogo</a></li>
  </ul>

</body>
</html>
