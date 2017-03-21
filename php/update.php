</html>
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
        <title>修改文档</title>
    </head>

    <body>
        <?php
		include_once ('connect.php');
		//通过post获取页面提交数据信息
		$id = addslashes(htmlspecialchars($_POST['id']));
		$category = addslashes(htmlspecialchars($_POST['category']));
		$title = addslashes(htmlspecialchars($_POST['title']));
		$editor = addslashes(htmlspecialchars($_POST['editor']));
		$time = htmlspecialchars($_POST['time']);

		if ($_POST['token'] == $_SESSION['token']) {
			$sql = "update article set category='" . $category . "',title='" . $title . "' ,editor='" . $editor . "',time='" . $time . "' where id='" . $id . "'";
			mysql_query("set names 'utf8'");
			mysql_query($sql, $con);
			$mark = mysql_affected_rows();
			//返回影响行数
			if ($mark >= 0) {
				echo "<script>alert('修改成功！');location='../dist/admin.html'</script>";
			} else {
				echo "<script>alert('修改失败！');location='../dist/admin.html'</script>";
			}
		} else {
			echo "token 不允许";
		}
		mysql_close($con);
		?>
    </body>

    </html>
