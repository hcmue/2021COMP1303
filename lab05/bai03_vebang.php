<form method="post">
<h3>DRAW TABLE</h3>
<div>
    Num of rows:
    <input type="number" name="numofrow" required min="1">
</div>
<div>
    Num of cols:
    <input type="number" name="numofcol" required min="1">
</div>
<button>DRAW</button>
</form>
<?php
if(isset($_REQUEST['numofrow']) 
    && isset($_REQUEST['numofcol']))
    {
        $dong = $_REQUEST['numofrow'];
        $cot = $_REQUEST['numofcol'];
        echo "$dong dòng x $cot cột";
        echo "<table border=1 cellspacing=0 cellpadding=5>";
        for($d = 0; $d < $dong; $d++){
            echo "<tr>";
            for($c = 0; $c < $cot; $c++){
                echo "<td>[$d, $c]</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>