<form action="" method="post" enctype="multipart/form-data">
    <table>
        <caption>THÊM BÓ HOA</caption>
        <tr>
            <td>Tên bó hoa</td>
            <td>
                <input type="text" name='TenBoHoa' />
            </td>
        </tr>
        <tr>
            <td>Giá bán</td>
            <td>
                <input type="number" min="0" name="GiaBan">
            </td>
        </tr>
        <tr>
            <td>Hình</td>
            <td>
                <input type="file" name="Hinh" id="">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <button>Thêm bó hoa</button>
            </td>
        </tr>
    </table>
</form>
<?php
if(isset($_FILES["Hinh"]) && isset($_REQUEST["TenBoHoa"]) 
    && isset($_REQUEST["GiaBan"])){
    //upload file vào thư mục hoa
    if($_FILES["Hinh"]["error"] == 0){
        if(move_uploaded_file($_FILES["Hinh"]["tmp_name"], 
            "./hoa/{$_FILES['Hinh']['name']}")){
            $chuoi = "/*{$_REQUEST['TenBoHoa']}|{$_REQUEST['GiaBan']}|{$_FILES['Hinh']['name']}";
            $filehandle = fopen("hoaxuan.txt", "a");
            fwrite($filehandle, $chuoi);
            fclose($filehandle);
            $chuoi_xuat = <<< EOD
            <div style="text-align:center;">
                Đã ghi file thành công!<br>
                <img src="./hoa/{$_FILES['Hinh']['name']}" /><br>
                {$_REQUEST['TenBoHoa']} - {$_REQUEST['GiaBan']}<br>
                <a href="BT02_doc_bo_hoa.php">Xem danh sách bó hoa</a>
            </div>
EOD;
            echo $chuoi_xuat;
        }
    }
}
?>