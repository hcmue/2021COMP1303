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
while($loai = $dsLoai->fetch()){
    $selected = $_REQUEST["MaLoai"] == $loai['MaLoai'] ? "selected" : "";
    echo "<option value='{$loai['MaLoai']}' {$selected}>{$loai['TenLoai']}</option>";
}
?>
</select><br>
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
                    alert($(this).data("id"));
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