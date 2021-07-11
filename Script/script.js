$(document).ready(function() {
    $("#search-bar").on('keyup', function() {

        let search = $("#search-bar").val();
        search.trim();
        $.ajax({
            type: "GET",
            url: "../../Class/bar_search.php",
            data: {
                searchPHP: search
            },
            dataType: "text",
            success: function(data) {
                console.log(data);
                $(".autocom-box").html(data);
                $(".autocom-box").css({ "border": "solid gainsboro 1px", "width": "150px" });
            }


        });



    });


});