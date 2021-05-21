<?php
$mahoa = $_REQUEST["MaHoa"];
include_once("MyCart.php");


//Thêm vào giỏ
Cart::InsertCart($mahoa);

//echo Cart::Display();
$chuoi = "{\"Count\":".Cart::GetQuantity().", \"Total\":".Cart::GetTotal()."}";
echo $chuoi;