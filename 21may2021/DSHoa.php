<link href="hoa.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include_once('DataProvider.php');
include_once('MyCart.php');

$sqlLoai = "SELECT * FROM loaihoa";
$dsLoai = DataProvider::ExecuteQuery($sqlLoai);
?>
Loại:
<select name="cboLoaiHoa" id="cboLoaiHoa">
<?php
while($loai = $dsLoai->fetch()){
    $selected = $_REQUEST["MaLoai"] == $loai['MaLoai'] ? "selected" : "";
    echo "<option value='{$loai['MaLoai']}' {$selected}>{$loai['TenLoai']}</option>";
}
?>
</select>
<a href="GioHang.php">
    <img src="images/cart.png" width="50" />
</a>
<span id="SoLuong"><?php echo Cart::GetQuantity(); ?></span> : 
<span id="TongTien"><?php echo Cart::GetTotal(); ?></span> đ.

<br>
<div id="result">
</div>

<script>
$(function(){
    const LayHoa = () => {
        $.ajax({
            url: 'GetHoa.php',
            data: {
                MaLoai: $("#cboLoaiHoa").val()
            },
            success: function(res){
                $("#result").html(res);
                $(".btnmua").click(function(e){
                    e.preventDefault();
                    $.ajax({
                        url: "XuLyGioHang.php",
                        type: "GET",
                        data: {
                            MaHoa: $(this).data("id")
                        },
                        dataType: "json",
                        success: function(result) {
                            console.log(result);
                            $("#SoLuong").html(result.Count);
                            $("#TongTien").html(result.Total.toLocaleString('en'));
                            Swal.fire({
                                icon: 'success',
                                title: 'Thêm giỏ hàng thành công',
                            });
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                });
            }
        });
    }
    LayHoa();
    $("#cboLoaiHoa").change(function(){
        LayHoa();
    });

});
</script>