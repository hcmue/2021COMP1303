<?php
    $n = 2;
    $kq = 1;
    for($i = 1; $i < 11; $i++)
    {
        $kq *= $n;
        $chuoi = <<<EOD
        $n<sup>$i</sup> = $kq
        <br>
EOD;
        echo $chuoi;
    }
?>