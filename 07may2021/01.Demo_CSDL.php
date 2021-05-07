<?php
$conn = mysqli_connect('localhost', 'root', '', 'qlbanhoa');

//set bảng mã
mysqli_query($conn, 'SET NAMES utf8');

$sql = "SELECT MaHoa, TenHoa, GiaBan, Hinh FROM hoa ORDER BY TenHoa";

$result = mysqli_query( $conn, $sql);
print_r($result);
while($row = mysqli_fetch_array($result)){
    echo $row["TenHoa"]. ' - '.$row[2].'<br>';
}

mysqli_close($conn);
?>
