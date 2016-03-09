(function ($, undefined) {
    $(document).ready(function () {
        $(".cross").hide();
        $("#primary-menu").hide();
        $(".hamburger").click(function () {
            $("#primary-menu").slideToggle("slow", function () {
                $(".hamburger").hide();
                $(".cross").show();
            });
        });

        $(".cross").click(function () {
            $("#primary-menu").slideToggle("slow", function () {
                $(".cross").hide();
                $(".hamburger").show();
            });
        });
        $(".fa-search").toggle( function () {
                $("#search-input").hide("slow");

        },function () {
            $("#search-input").show("slow");

        });

        $(function(){
            $('#menu-item-58 a').text('');
        });
    });
})(jQuery);



