<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>删除文档</title>
</head>
<body>
	<?php
	include_once('connect.php');
	$id = $_GET['id'];
	$sql = "DELETE FROM article WHERE id= '" . $id . "'";
	mysql_query($sql, $con);
	$mark = mysql_affected_rows();
	$url = "main.php";
	if ($mark) {
		echo "<script>alert('删除成功！');location='../dist/admin.html'</script>";
	} else {
		echo "<script>alert('删除失败！');location='../dist/admin.html'</script>";

	}
	mysql_close($con);
	?>

</body>
</html>