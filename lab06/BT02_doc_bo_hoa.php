<?php
$file_content = file_get_contents("hoaxuan.txt");
$dshoa = explode("/*", $file_content);
foreach($dshoa as $key => $hoa){
    if($hoa != ""){
        $data = explode("|", $hoa);
        $chuoi_xuat = <<< EOD
        <div style="text-align:center; border:1px solid blue; width:120px; display:inline-block;">
            <img src="./hoa/{$data[2]}" /><br>
            {$data[0]} - {$data[1]}
        </div>
    EOD;
        echo $chuoi_xuat;
    }
}