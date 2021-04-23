<?php

class Nguoi
{
    var $age;
    var $name;
    public static $dem = 0;
    public function __construct($name, $age)
    {
        $this->age = $age;
        $this->name = $name;
        self::$dem ++;
    }

    public static function InDem(){
        echo "Có ".self::$dem.".<br>";
    }

    public function Xuat()
    {
        echo "{$this->name} - {$this->age} tuổi.<br>";
    }
}
Nguoi::InDem();
$sva = new Nguoi("Tèo", 19);
$sva->Xuat();
Nguoi::InDem();
echo Nguoi::$dem;