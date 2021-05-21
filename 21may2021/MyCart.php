<?php
session_start();
//session_destroy();
class Cart
{
	public static function InsertCart($id, $qty = 1)
	{
		if(isset($_SESSION["MyCart"][$id]))
			$_SESSION["MyCart"][$id] += $qty;
		else
			$_SESSION["MyCart"][$id] = 1;
	}
	
	public static function DeleteCart($id)
	{
		if(isset($_SESSION["MyCart"][$id]))
			unset($_SESSION["MyCart"][$id]);
	}
	
	public static function UpdateCart($id, $quantity)
	{
		if(isset($_SESSION["MyCart"][$id]))
			$_SESSION["MyCart"][$id] = $quantity;
	}
	
	public static function Display()
	{
		include_once("DataProvider.php");
		$sum = 0;
		foreach($_SESSION['MyCart'] as $MaHoa => $SoLuong)
		{
			$rs= DataProvider::ExecuteQuery("SELECT GiaBan FROM hoa WHERE MaHoa = $MaHoa");
			$row = $rs->fetch();
			$sum += $SoLuong * $row['GiaBan'];
		}
		return "Số MH: ".count($_SESSION['MyCart']).", tổng tiền: $sum";
	}

    public static function GetQuantity()
    {
        
        return isset($_SESSION['MyCart']) ? count($_SESSION['MyCart']) : 0;
    }

    public static function GetTotal()
    {
        include_once("DataProvider.php");
		$sum = 0;
        if(isset($_SESSION['MyCart']))
        {
            foreach($_SESSION['MyCart'] as $MaHoa => $SoLuong)
            {
                $rs= DataProvider::ExecuteQuery("SELECT GiaBan FROM hoa WHERE MaHoa = $MaHoa");
                $row = @$rs->fetch();
                $sum += $SoLuong * $row['GiaBan'];
                $rs->closeCursor();
            }
        }
		return $sum;
    }
}
?>