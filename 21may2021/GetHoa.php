<?php
include_once('DataProvider.php');
$sqlHoa = "select MaHoa, TenHoa, GiaBan, Hinh, TenLoai from hoa join loaihoa lo on lo.MaLoai = hoa.MaLoai
";
if(isset($_REQUEST["MaLoai"])){
    $sqlHoa .= " WHERE hoa.MaLoai = ".$_REQUEST["MaLoai"];
}

$result = DataProvider::ExecuteQuery($sqlHoa);
while($hoa = $result->fetch()){
    $gia = number_format($hoa['GiaBan']);
    $chuoiHoa = <<< EOD
    <div class="hh-box">	
        <div class="hh-box-promotion"></div>
        <div class="hh-box-qua"></div>
        <img src="hoa/{$hoa['Hinh']}" class="hh-box-image">
        <img src="images/moi-icon.png" class="hh-box-new" >
        <div class="hh-box-name">{$hoa["TenHoa"]}</div>
        <div class="hh-box-gia">{$gia} đ</div>
        <button data-id="{$hoa['MaHoa']}" class="btnmua">Mua</button>
    </div>
EOD;
    echo $chuoiHoa;
}
?>