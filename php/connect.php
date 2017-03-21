
<?php
$host="localhost";
$db_user="root";
$db_pass="root";
$db_name="blog";

$con=mysql_connect($host,$db_user,$db_pass);
// 检测连接
// if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

mysql_select_db($db_name,$con);
mysql_query("SET names UTF8");
header("Content-Type: text/html; charset=utf-8");
?>
