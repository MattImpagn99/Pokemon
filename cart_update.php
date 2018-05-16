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
      session_start(); //[1]
      require_once("item.php"); //[2]
  ?>

  <html>
  	<body>
  		<?php
  			//[3]
  			if(isset($_POST["type"]) && $_POST["type"]=='add')
  			{
  				$product_code = $_POST["product_code"]; //[4]
  				$product_qty = $_POST["product_qty"];  //[5]
  				$product_price = $_POST["product_price"];//[6]
  				$product_name = $_POST["product_name"]; //[7]

  			    /*[8]*/
  			    $cartItem = new CartItem($product_code, $product_name,  $product_price, $product_qty);
  			    //$cartItem->printItem(); for debug
  			    $product =  (serialize($cartItem)); //[8.5]
  				if(!isset($_SESSION["products"])) //[9]
  				{
  				     $_SESSION["products"] = array($product);//[10]
  				}
  				else
  				{
  					array_push($_SESSION["products"], $product); //[11]
  				}
  			}

  			if (isset($_POST["type"]) && $_POST["type"]=='empty') //[12]
  			{
  				session_unset(); //[13]
  				echo "THE CART IS EMPTY!";
  			}

  			if(isset($_SESSION["products"]))  //[14]
  			{
  			//Print the cart Table
  			  echo "<table border=1>";
  			  echo "<tr>";
  			  echo "<td>Product Name</td><td>Product Price</td><td>Quantity</td>";
  			  echo "</tr>";
  			  foreach ($_SESSION["products"] as $cart_itm)
  			  {
  			    	echo "<tr>";
  			    	$obj = unserialize($cart_itm);
  				    $obj->printItemAsTr();
  				    echo "</tr>";
  				}
  				echo "</table>";
  			 }

  		?>

  		<!-- Print the button empty cart -->
  		<form method="post" action="cart_update.php">
  			<input type="submit" value="Empty" />
  		    <input type="hidden" name="type" value="empty" />
  		</form>
  	</body>
  </html>
</html>
