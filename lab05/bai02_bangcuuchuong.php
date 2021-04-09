<table border="1" cellspacing=0 cellpadding=5>
<?php
for($d = 2; $d < 11; $d++){
    echo "<tr>";
    for($c = 1; $c < 11; $c++){
        echo "<td>$d x $c = ".$d*$c."</td>";
    }
    echo "</tr>";
}
?>
</table>