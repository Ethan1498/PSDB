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
        $(".pagenum").each(function(){
            if ($(this).attr("id") < select_id-2) {
                $(this).addClass("hidden");
            }else if ($(this).attr("id") > select_id+2) {
                $(this).addClass("hidden");
            }else{
                $(this).removeClass("hidden");
            }
        });
    });
    $("#first").click(function(){
       var select_id = $(this).parent().attr("id");
       $.ajax({
           url: "scripts/pagination.php",
           type: "GET",
           data: {
               page : 1
           },
           cache: false,
           success: function(dataResult){
               $("#target-content").html(dataResult);
               $(".pagenum").removeClass("active");
               $("#"+select_id).addClass("active");
           }
       }); 
    });
    $("#last").click(function(){
        var select_id = $(this).parent().attr("id");
        $.ajax({
            url: "scripts/pagination.php",
            type: "GET",
            data: {
                page : select_id
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
