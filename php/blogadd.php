<?php
header("Content-Type: text/html; charset=utf-8");
error_reporting(E_ERROR);
session_start();
$token = md5(uniqid(rand(), TRUE));
$_SESSION['token'] = $token;
if (!isset($_SESSION['user'])) {
    echo "<p align=center>";
    echo "<font color=#ff0000 size=4><strong><big>";
    echo "您还没有登录,请<a href='../dist/land.html'>登录</a>!";
    echo "</big></strong></font></p>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>添加文档</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../dist/css/iconfont.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/add.css">
</head>

<body screen_capture_injected="true">
    <!-- 添加文档 -->
    <div id="add" class="container">
        <form action="add.php" method="post" class="add-con">
         <input type="hidden" name="token" value="<?php echo $token; ?>" class="form-control" >
            <!-- 添加文档头部 -->
            <div class="modal-header ">
                <h4 class="modal-title">添加文档</h4>
            </div>
            <!-- 添加文档内容 -->
            <div class="modal-body">
                <!-- 输入文章标题 -->
                <div class="add-a">
                    <label for="title" class="col-sm-2">文章标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" required="required" placeholder="请输入文章标题">
                    </div>
                </div>
                <!-- 选择分类 -->
                <div class="add-a">
                    <label for="category" class="col-sm-2">分类目录</label>
                    <div class="col-sm-3">
                        <select name="category" class="form-control" id="category">
                            <option>技术文档</option>
                            <option>前端笔记</option>
                        </select>
                    </div>
                </div>
                <div class="add-b">
                    <textarea name="editor" id="editor" class="form-control" rows="10" placeholder="在这里详细输入文章内容" autocomplete="off"></textarea>
                </div>
                <!-- 日期 -->
                <div class="mod-a">
                    <label for="time" class="col-sm-2">时间</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" name="time" class="form-control" id="time" required="required">
                    </div>
                </div>
            </div>
            <!-- 添加文档确认按钮 -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">确认</button>
                <a href="../dist/admin.html" class="btn btn-info">取消</a>
            </div>
        </form>
    </div>
</body>

</html>
