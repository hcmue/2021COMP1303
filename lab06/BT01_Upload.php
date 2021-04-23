<form method="post" enctype="multipart/form-data" action="">
    Chọn file:
    <input type="file" name="myfile" />
    <button>Gửi file</button><button type="reset">Nhập lại</button>
</form>
<?php
if(isset($_FILES["myfile"])){
    if($_FILES["myfile"]["error"] == 0){
        if(move_uploaded_file($_FILES["myfile"]["tmp_name"], 
            "./data/{$_FILES['myfile']['name']}")){
                echo "Upload file thành công";
            }
    }
    else{
        echo "Có lỗi upload file";
    }
}

?>