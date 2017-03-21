$(function() {
    //导航
    var sInfo = {
        category: '技术文档'
    };
    getData(sInfo);
    $("a.tit").each(function(index) {
            $(this).click(function() {
                $("a.tit.tabin").removeClass("tabin");
                $(this).addClass("tabin");
                var sInfo = {
                    category: $(".tabin").text()
                };
                getData(sInfo);
            })
        })
        //ajax
    function getData(sInfo) {
        $.ajax({
            type: 'post',
            url: '../php/browse.php',
            dataType: 'json',
            data: sInfo,
            success: function(json) {
                $("#list div").empty();
                console.log(json);
                var div = "";
                var list = json.list;
                $.each(list, function(index, array) { //遍历json数据列
                    div += "<div class='panel panel-default'><div class='panel-heading'><h3  class='panel-title'>" + array['title'] + "</h3><span name='time'><i class='iconfont icon-riqi'></i>" + array['time'] + "</span><span name='category'><i class='iconfont icon-wendang'></i>" + array['category'] + "</span></div><div class='panel-body con-body' name='editor'><p>" + array['editor'] + "</p><a href='../php/deta.php?id=" + array['id'] + "' class='jx'>继续阅读>></a></div></div>";
                });
                $("#list div").append(div);
            },
            error: function() {
                $("#list div").html("请求数据失败");
            }
        });
    }
    // 返回顶部
    $(document).ready(function() {
        if ($(this).scrollTop() == 0) {
            $(".top").hide();
        }
        $(window).scroll(function(event) {
            if ($(this).scrollTop() == 0) {
                $(".top").hide();
            }
            if ($(this).scrollTop() != 0) {
                $(".top").show();
            }
        });
        // 鼠标点击回到顶部
        $(".top").click(function(event) {
            $("html,body").animate({
                scrollTop: "0px"
            })
        });
    });
})
