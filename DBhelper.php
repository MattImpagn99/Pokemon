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

  return $sth->fetch()[0];
}

function runQuery($query)
{
  $result =  mysql_query($query) or die ("Error in query: $query " . mysql_error());
  return $rowcount;
}

function runRows($query)
{
  $result =  mysql_query($query);
  $rowcount =  mysql_num_rows($result) or die (mysql_error());
  return $rowcount;
}

function logout()
{
  session_start();
  session_destroy();
  header("location:index.html");
  exit;
}
  ?>
