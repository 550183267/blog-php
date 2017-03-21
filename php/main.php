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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>博客后台</title>
    </head>

    <body>
        <!-- 文档列表 -->
        <div id="file">
            <table class="table table-hover border-right" id="table">
                <?php
                    include_once('connect.php');
                   //执行SQL 得到结果集
                  $result =mysql_query("SELECT * FROM article ORDER BY id DESC");
                  while($row=mysql_fetch_array($result)){
                ?>
                    <tr class='tr'>
                        <td><i class='round'></i>
                            <?php echo $row['time'] ?>
                        </td>
                        <td>
                            <?php echo $row['category'] ?>
                        </td>
                        <td>
                            <?php echo $row['title'] ?>
                        </td>
                        <td>
                            <a href="../php/update1.php?id=<?php echo $row['id'] ?>" class="edit"><i class='iconfont icon-xiugai edit' id='edit'></i></a>
                            <a href="../php/del.php?id=<?php echo $row['id'] ?>" class="edit"><i class='iconfont icon-shanchu' id='del'></i></a>
                        </td>
                    </tr>
                    <?php
                     }
                     ?>
            </table>
    </div>
    </body>

    </html>
