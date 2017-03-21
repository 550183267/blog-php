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
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>修改文档</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../dist/css/iconfont.css">
        <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../dist/css/add.css">
    </head>

    <body>
        <div>
            <?php
                include_once('connect.php');
                $sql = "select * from article where id='".$_GET['id']."'";
                $result = mysql_query($sql,$con);
                if($row = mysql_fetch_array($result)){
            ?>
                <div class="list-group">
                    <form action="update.php" method="post" class="form-horizontal add-con">
                        <input type="hidden" name="token" value="<?php echo $token; ?>" class="form-control">
                        <!-- 修改文档头部 -->
                        <div class="modal-header">
                            <h4 class="modal-title">修改文档</h4>
                        </div>
                        <!-- 修改文档内容 -->
                        <div class="modal-body">
                            <!-- 文章id -->
                            <div class="add-a">
                                <label for="id" class="col-sm-2">ID</label>
                                <div class="col-sm-2">
                                    <input type="number" name="id" class="form-control" value="<?php echo $row['id']?>" required="required" readonly="readonly" />
                                </div>
                            </div>
                            <!-- 输入文章标题 -->
                            <div class="add-a">
                                <label for="title" class="col-sm-2">文章标题</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" required="required" value="<?php echo $row['title']?>">
                                </div>
                            </div>
                            <div class="add-a">
                                <label for="category" class="col-sm-2">分类目录</label>
                                <div class="col-sm-3">
                                    <select name="category" class="form-control" value="<?php echo $row['category']?>">
                                        <option>技术文档</option>
                                        <option>前端笔记</option>
                                    </select>
                                </div>
                            </div>
                            <div class="add-b">
                                <textarea name="editor" class="form-control" rows="10" required="required">
                                    <?php echo $row['editor']?>
                                </textarea>
                            </div>
                            <div class="mod-a">
                                <label for="time" class="col-sm-2">时间</label>
                                <div class="col-sm-3">
                                    <input type="datetime-local" name="time" class="form-control" required="required" value="<?php echo $row['time']?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">
                                    提交
                                </button>
                                <button type="reset" class="btn btn-default">
                                    重置
                                </button>
                                <a href="../dist/admin.html" class="btn btn-info">取消</a>
                            </div>
                        </div>
                    </form>
                </div>
                <?php } ?>
        </div>
    </body>

    </html>
