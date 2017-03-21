<!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>个人博客</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../dist/css/iconfont.css">
        <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../dist/css/index.css">
    </head>

<body screen_capture_injected="true">
        <!-- 左边内容 -->
    <div class="container">
        <!-- 文章详细内容 -->
        <div id="content">
           <?php
                   include_once('connect.php');
                   $id = $_GET['id'];
                  $sql = "select * from article where id= '" . $id . "'";
                  $result = mysql_query($sql,$con);
                  if($row = mysql_fetch_array($result)){
                ?>

        <ol class="breadcrumb">
              <li><a href="../dist/index.html">个人博客</a></li>
              <li class="active"><?php echo $row['category'] ?></li>
              <li class="active"><?php echo $row['title'] ?></li>
        </ol>
        
        <!-- 文档显示 -->
            <article class="article" id="deta">
                <div>
                    <div class='con-head'>
                        <h3 name="title"><?php echo $row['title'] ?></h3>
                        <span name="time"><i class='iconfont icon-riqi'></i><?php echo $row['time'] ?></span>
                    </div>
                    <div class='panel-body'>
                      <pre name="editor"><?php echo $row['editor'] ?></pre>
                    </div>
                </div>
                    <?php
                     }
                     ?>
            </article>
            <a href="../dist/index.html" class="fh btn btn-info">返回</a>
        </div>
    </div>
    <div class="top"></div>
    <script type="text/javascript" src="../dist/javascripts/jquery2.2.1.min.js"></script>
    <script type="text/javascript" src="../dist/javascripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="../dist/javascripts/index.js"></script>
    </body>

    </html>
