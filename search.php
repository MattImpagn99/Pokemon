<html>
<head>
  <link rel ='stylesheet' href='css/bootstrap.css'>
  <link rel ='stylesheet' href='style.css'>
</head>

<body>

<ul>

  <li><a href = "login.html"> Login </a></li>
  <li><a href = "registrati.html"> Registrati </a></li>
  <li><a href = "Catalogo.php"> Catalogo </a></li>
  <li><a href = "index.html"> HomePage </a></li>
   <form action= "search.php" method="get">
     <input type='text' placeholder='Ricerca' name='search'> <br>
   </form>

</ul>

<?php
      $x_pag = 10;  //[1] how many rows to display for each page

      if (isset($_GET['pag'])) //[2]
      {
          $pag = $_GET['pag'];
      }
      else
      {
         $pag  = 1;
      }

      //You could do the same at th point [2] with
      //$pag = isset($_GET['pag']) ? $_GET['pag'] : 1;

      if (!$pag || !is_numeric($pag))  //[3]
      {
          $pag = 1;
      }

      include('DBhelper.php');

      $src= $_GET['search'];
      $sql = "SELECT * FROM pokemon WHERE pokemon.identifier like '%$src%' "; //[8]
      $res = run($sql);


      echo "<table class ='table table-dark'><tr><th>details</th><th>name</th><th>height</th><th>weight</th></tr>";
      while($result = $res->fetch(PDO::FETCH_ASSOC))
      {

        echo "<tr><td>" .$result['identifier']. "</td><td>" . $result['height']
            ."</td><td>" .$result['weight'] . "</td>";
      }
      echo "</table>";


  ?>


</body>
</html>
