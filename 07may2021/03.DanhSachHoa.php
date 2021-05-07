<link href="hoa.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
include_once('DataProvider.php');

$sqlLoai = "SELECT * FROM loaihoa";
$dsLoai = DataProvider::ExecuteQuery($sqlLoai);
?>
Loại:
<select name="cboLoaiHoa" id="cboLoaiHoa">
<?php
while($loai = mysqli_fetch_array($dsLoai)){
    $selected = $_REQUEST["MaLoai"] == $loai['MaLoai'] ? "selected" : "";
    echo "<option value='{$loai['MaLoai']}' {$selected}>{$loai['TenLoai']}</option>";
}
?>
</select><br>
<?php
$sqlHoa = "select MaHoa, TenHoa, GiaBan, Hinh, TenLoai from hoa join loaihoa lo on lo.MaLoai = hoa.MaLoai
";
if(isset($_REQUEST["MaLoai"])){
    $sqlHoa .= " WHERE hoa.MaLoai = ".$_REQUEST["MaLoai"];
}

$result = DataProvider::ExecuteQuery($sqlHoa);
while($hoa = mysqli_fetch_array($result)){
    $gia = number_format($hoa['GiaBan']);
    $chuoiHoa = <<< EOD
    <div class="hh-box">	
        <div class="hh-box-promotion"></div>
        <div class="hh-box-qua"></div>
        <img src="hoa/{$hoa['Hinh']}" class="hh-box-image">
        <img src="images/moi-icon.png" class="hh-box-new" >
        <div class="hh-box-name">{$hoa["TenHoa"]}</div>
        <div class="hh-box-gia">{$gia} đ</div>
    </div>
EOD;
    echo $chuoiHoa;
}
?>

<script>
$(function(){

    $("#cboLoaiHoa").change(function(){
        window.location.href = '03.DanhSachHoa.php?MaLoai=' + $(this).val();
    });

});
</script>