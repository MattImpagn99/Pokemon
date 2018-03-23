  <?php

  function connect()
  {
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
     return $conn;
}

function run($query)
{
    $conn = connect();
    $sth = $conn->prepare($query);
    $sth->execute();

    return $sth;
}

function insert($query)
{
  $conn = connect();
  $sth = $conn->prepare($query);
  $sth->execute();
}

function getnumber($query)
{
  $conn = connect();
  $sth = $conn->prepare($query);
  $sth->execute();

  return $sth->fetchColumn();
}

  ?>
