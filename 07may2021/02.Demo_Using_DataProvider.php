<?php
include_once('DataProvider.php');

$sqlLoai = "SELECT * FROM loaihoa";
$dsLoai = DataProvider::ExecuteQuery($sqlLoai);
?>
Loại:
<select name="" id="">
<?php
while($loai = mysqli_fetch_array($dsLoai)){
    echo "<option value='{$loai['MaLoai']}'>{$loai['TenLoai']}</option>";
}
?>
</select>