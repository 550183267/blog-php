<?php
header("Content-Type: text/html; charset=utf-8");
// requite_once 'connect.php';
include_once('connect.php');
function conndetDb(){
	if(!$con){
		die('Can not connect db');
	}
	return $con;
}
?>