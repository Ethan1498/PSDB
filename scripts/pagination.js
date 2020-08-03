$(document).ready(function() {
    $("#target-content").load("scripts/pagination.php?page=1");
    $(".page").click(function(){
        var id = $(this).attr("data-id");
        var select_id = $(this).parent().attr("id");
        $.ajax({
            url: "scripts/pagination.php",
            type: "GET",
            data: {
                page : id
            },
            cache: false,
            success: function(dataResult){
                $("#target-content").html(dataResult);
                $(".pagenum").removeClass("active");
                $("#"+select_id).addClass("active");
                
            }
        });
    });
});