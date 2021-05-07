<?php
include_once('DataProvider.php');

$sqlLoai = "SELECT * FROM loaihoa";
$dsLoai = DataProvider::ExecuteQuery($sqlLoai);
?>
<form action="" enctype="multipart/form-data" method="post">
<h2>THÊM HOA</h2>
Loại:
<select name="cboLoaiHoa" id="cboLoaiHoa">
<?php
while($loai = mysqli_fetch_array($dsLoai)){
    $selected = $_REQUEST["MaLoai"] == $loai['MaLoai'] ? "selected" : "";
    echo "<option value='{$loai['MaLoai']}' {$selected}>{$loai['TenLoai']}</option>";
}
?>
</select><br>
Tên hoa: <input name="txtTenHoa"><br>
Giá bán: <input type="number" name="txtGiaBan" id=""><br>
Thành phần:
<textarea name="txtThanhPhan" id="" cols="30" rows="10"></textarea><br>
Hình:
<input type="file" name="txtHinh" id=""><br>
<button>Thêm</button>
</form>
<?php
if(isset($_FILES["txtHinh"]) && isset($_REQUEST['txtTenHoa'])) {
    if($_FILES["txtHinh"]["error"] == 0) {
        $hinh = $_FILES["txtHinh"]["name"];
        if(move_uploaded_file($_FILES["txtHinh"]["tmp_name"], "./hoa/".$hinh)){
            echo $hinh;
            $sqlThemHoa = "INSERT INTO `hoa`(`MaLoai`, `TenHoa`, `GiaBan`, `ThanhPhan`, `Hinh`) VALUES ('{$_REQUEST['cboLoaiHoa']}', '{$_REQUEST['txtTenHoa']}', {$_REQUEST['txtGiaBan']}, '{$_REQUEST['txtThanhPhan']}', '{$hinh}');";
            echo $sqlThemHoa;
            DataProvider::ExecuteQuery($sqlThemHoa);
        }
    }
}