<?php
    try
    {
        $dbh = new PDO("mysql:host=localhost;dbname=qlbanhoa", "root", "");
        $dbh->query("SET NAMES 'utf8'");
        $result = $dbh->query("SELECT MaHoa, TenHoa, GiaBan FROM hoa");
        while($row = $result->fetch())
        {
            echo "{$row[0]} - {$row['TenHoa']}.<br>";
        }
    }
    catch (PDOException  $ex)
    {
        
    }

    $dbh = null;
