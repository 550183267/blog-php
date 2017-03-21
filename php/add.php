<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if (!isset($_SESSION['user'])) {	
          echo "<p align=center>";
	echo "<font color=#ff0000 size=4><strong><big>";
	echo "您还没有登录,请<a href='../dist/land.html'>登录</a>!";
	echo "</big></strong></font></p>";
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>添加文档</title>
	</head>
	<body>
		<?php
		include_once ('connect.php');
		//添加数据
		$category = addslashes(htmlspecialchars($_POST['category']));
		$title = addslashes(htmlspecialchars($_POST['title']));
		$editor = addslashes(htmlspecialchars($_POST['editor']));
		$time = htmlspecialchars($_POST['time']);

		if ($_POST['token'] == $_SESSION['token']) {
			$sql = "INSERT INTO article (title,editor,time,category) VALUES ('$title', '$editor', '$time', '$category');";
			mysql_query("set names 'utf8'");
			if (mysql_query($sql, $con)) {
				echo "<script>alert('添加成功！');location='blogadd.php'</script>";
			} else {
				echo "<script>alert('添加失败！');location='blogadd.php'</script>";
			}
		}else{
			echo "token 不允许";
		}
		mysql_close($con);
		?>
	</body>
</html>