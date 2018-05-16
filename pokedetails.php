<html>
  <head>
    <link rel ='stylesheet' href='css/bootstrap.css'>
    <link rel ='stylesheet' href='style.css'>

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

  .evid
  {
    color: white;
    font-weight: bold;
    font-size: 25px;
    display: inline-block;

  }
  </style>
  </head>

  <ul>
    <li><a href = "Catalogo.php"> Catalogo </a></li>
  </ul>

<?php

  session_start();      //parte la sessione
  include("DBhelper.php");  //importo il DBhelper


  if (isset($_GET['idPoke']))  //array associativo
  {
    $idPoke = $_GET['idPoke'];  //va a vedere il valore che ho messo in DBhelper nella tabella
  }
  else
  {
    $idPoke = 1;   //altrimenti assegna il valore 1
  }

//recupera e stampa le caratteristiche del pokemon con la query
$result = run("SELECT * FROM pokemon WHERE id= ' " . $idPoke . " ' ");
$row = $result->fetch();

echo '<form method="post" action ="cart_update.php">';

echo  "<table class ='table table-dark'><tr><th>id</th><th>identifier</th><th>weight</th><th>height</th><th>price</th></tr>";

    echo "<tr> <td> ".$row['id']. "</td><td>" . $row['identifier']."</td><td>"
    . $row['weight'] . "</td><td>" . $row['height']. "</td><td>"
    . $row['base_experience']. "</td></tr>";

  echo "</table>";



echo "<div class = 'evid'>Qty</div>";
echo '<input type="text" name ="product_qty" value="1" size="3" />';
echo '<input type="submit" value="Add to cart" />';
echo '<input type="hidden" name="product_code" value="' . $row['id'] . '" />';
echo '<input type="hidden" name="product_name" value="' . $row['identifier'] . '" />';
echo '<input type="hidden" name="product_price" value="' . $row['base_experience'] . '" />';
echo '<input type="hidden" name="type" value="add" />';
echo '</form>';
?>
</html>
