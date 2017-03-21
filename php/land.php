<?php
session_start();  
include_once('connect.php');
// mysql_select_db("land",$con);
$user = $_POST['user'];
$password =md5($_POST['password']);
 //查询
$sql  = "SELECT * FROM `land` WHERE `user`='".$user."' AND `password`='".$password."'";
$set = mysql_query($sql,$con);
$result = mysql_fetch_array($set);
if($result){
	$_SESSION['user']=$user;
	echo  "<script>alert('登陆成功');location='../dist/admin.html'</script>";	
}else{
    echo  "<script>alert('账号或密码错误,登录失败!');location='../dist/land.html'</script>";
}
mysql_close($con);
?>
