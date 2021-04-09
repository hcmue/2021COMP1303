<form>
<h2>TÌM THỨ TRONG TUẦN</h2>
Ngày/Tháng/Năm 
<input type="number" name="Ngay" min="1" max="31" required>
<input type="number" name="Thang" min="1" max="12" required>
<input type="number" name="Nam" min="2000" required>
<button>Tìm</button>
</form>
<?php
$ngay = $_REQUEST["Ngay"];
$thang = $_REQUEST["Thang"];
$nam = $_REQUEST["Nam"];
if(isset($ngay) && !empty($ngay)&&isset($thang) && !empty($thang)
    &&isset($nam) && !empty($nam)){
        $jd=cal_to_jd(CAL_GREGORIAN,$thang,$ngay,$nam);
        $day = jddayofweek($jd,0);
        $ngaythu = '';
        switch($day){
            case 0: $ngaythu = 'Chủ nhật'; break;
            case 2: $ngaythu = 'Thứ Hai'; break;
            case 3: $ngaythu = 'Thứ Ba'; break;
            case 4: $ngaythu = 'Thứ Tư'; break;
            case 5: $ngaythu = 'Thứ Năm'; break;
            case 6: $ngaythu = 'Thứ Sáu'; break;
            case 7: $ngaythu = 'Thứ Bảy'; break;
        }
        echo "$ngay/$thang/$nam là ngày $ngaythu";
    }
?>