<?php
class CartItem
{
	public $id;
	public $identifier;
	public $qty;
	public $price;

	function __construct($id, $idetifier, $price, $qty)
  {
		$this->id = $id;
		$this->identifier=$idetifier;
		$this->qty = $qty;
		$this->price = $price;
	}

	function  printItem() //usefull for debugging
	{
	    echo $this->id. " ". $this->identifier. " " . $this->price . " " . $this->qty;
	}

	function printItemAsTr()  //[1]
	{
		echo " <td> ". $this->identifier . "</td><td>" . $this->price . "</td><td>" . $this->qty ."</td>";
	}
}
?>
