<?php
class DataProvider 
{
	public static function ExecuteQuery($sql)
	{
        try
        {
            $dbh = new PDO("mysql:host=localhost;dbname=qlbanhoa", "root", "");
            $dbh->query("SET NAMES 'utf8'");
            $result = $dbh->query($sql);            
        }
        catch (PDOException $ex)
        {            
        }

        $dbh = null;
        return $result;
	}
}
?>