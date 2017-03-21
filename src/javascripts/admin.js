//博客后台
$(function() {
    $("#file").load("../php/main.php");
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
