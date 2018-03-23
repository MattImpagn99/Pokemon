<html>
<body>
<head>
  <link rel ='stylesheet' href='css/bootstrap.css'>
</head>

  <h1> Pokemon Store </h1>
  <br>
  <br>
 <?php
         error_reporting(E_ALL);
         ini_set('display_errors', 'on');
         $servername = 'localhost';
         $port = 3306;
         $username = 'root';
         $password = 'mysql';
         $dbName= 'pokemon';

    try
    {
      $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
      // set the PDO error mode to exception

       //"Connected successfull"
    }

    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }

    $sql = "SELECT * FROM pokemon limit 5";
    $sth = $conn->prepare($sql);
    $sth->execute();

    //print("PDO::FETCH_ASSOC: ");
    /*  print("<br>");
    print("You can found the first order line with a relative values <br>");  //print("Return next row as an array indexed by column name <br>")
    print("<br>");
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    print_r($result);
    print("<br>");*/
    echo "
    <table class='table table-dark'>
      <thead>
        <tr>
          <th scope='col'>#</th>
          <th scope='col'>first</th>
          <th scope='col'>last</th>
          <th scope='col'>handle</th>
          <th scope='col'>base_experience</th>
        </tr>
      </thead>
      <tbody>
        ";
    $cont=1;
    while($result = $sth->fetch(PDO::FETCH_ASSOC))
    {
        echo "<tr> <th scope='row'>" . $cont."</th> <td>" . $result ['identifier']. "</td> <td>" . $result['height']. "</td> <td>" .$result['weight']."</td> <td>" .$result['base_experience']. "</td> </tr>";
        $cont++;
    }
    echo "</tbody> </table>";

 ?>

</body>
</html>
