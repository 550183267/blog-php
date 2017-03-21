#个人博客PHP+MYSQL后台
注：数据库sql脚本文件在SQL文件夹里（数据库名为：blog,数据表名为：article/land）
src文件夹下有未被压缩合并的源文件
dist文件夹压缩后的文件

1.在reg.php和land.php里使用md5()函数给用户密码加密
$password = md5(addslashes(htmlspecialchars($_POST['password'])));

2.使用session记录登陆状态

3.使用Token进行CSRF防御
session_start();
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;

<input type="hidden" name="token" value="<?php echo $token; ?>" class="form-control" >

if ($_POST['token'] == $_SESSION['token']) {
//添加到数据库
}

4.在add.php和upadte.php里用PHP htmlspecialchars()函数把输入的预定义的字符转换为 HTML 实体
$category =addslashes(htmlspecialchars($_POST['category']));//类别
$title = addslashes(htmlspecialchars($_POST['title']));//标题
$editor = addslashes(htmlspecialchars($_POST['editor']));//文章
$time = htmlspecialchars($_POST['time']);//时间
这样做防止用户在添加新闻内容或者编辑更新新闻内容时输入预定义的字符如 ‘< 和 >’浏览器将其用作 HTML 元素（防止xss注入）

