<?php
include_once('connect.php');
 $user = $_POST['user'];
 $password = md5(addslashes(htmlspecialchars($_POST['password'])));
 //插入
$sql = "INSERT INTO `land` (`user`, `password`) VALUES ('$user', '$password')";
$set = mysql_query($sql,$con);
if($sql){
	echo  "<script>alert('注册成功！');location='../dist/land.html'</script>";
}else{
	echo "<script>alert('注册失败！');location='../dist/land.html'</script>";
}
mysql_close($con);
?>
