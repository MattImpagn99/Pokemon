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



      $sql = "SELECT count(*) FROM pokemon"; // [4]

      $all_rows = getnumber($sql);  //[5]
      $all_pages = ceil($all_rows / $x_pag); //[6]
      $first = ($pag-1) * $x_pag;  //[7]



      $sql = "SELECT * FROM pokemon LIMIT $first, $x_pag"; //[8]
      $res = run($sql);


      echo "<table class ='table table-dark'><tr><th>name</th><th>height</th><th>weight</th></tr>";
      while($result = $res->fetch(PDO::FETCH_ASSOC))
      {
        echo "<tr><td>" .$result['identifier']. "</td><td>" . $result['height']
            ."</td><td>" .$result['weight'] . "</td>";
      }
      echo "</table>";


      if ($all_pages > 1)
      { //[9]
          if ($pag > 1)
          {  //[10]
              //[11]:$_SERVER['PHP_SELF'] returns the courrent page address
              //eg: http://localhost/PHP_TESTS/pkStore/catalog.php
              //if we add the string ?pag=x, the value x is stored in $_GET['pag']
              echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag - 1) . "\">";
              echo "Pagina Precedente</a>&nbsp;";
          }

          if ($all_pages > $pag)
          {  //[12]
              echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag + 1) . "\">";
              echo "Pagina Successiva</a>";
          }
          echo "<br>";

      }
  ?>
  <br>
  <br>

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

<a href="index.html" target="_blank">Homepage</a>

</body>
