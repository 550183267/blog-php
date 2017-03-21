<?php
require_once 'connect.php';
header("Content-Type: text/html; charset=utf-8");
$category = $_POST['category'];
$query = mysql_query("SELECT * FROM article WHERE category='".$category."'");
$arr=array();
while($row=mysql_fetch_assoc($query)){
	mysql_query("SET names UTF8");
	 $arr['list'][] = array(
	 	'id' => $row['id'],
		'title' => $row['title'],
		'editor' => $row['editor'],
		'category' => $row['category'],
		 'time' => $row['time'], 
	 );
}
echo json_encode($arr);
?>