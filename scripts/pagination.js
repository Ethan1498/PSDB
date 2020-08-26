$(document).ready(function() {
    $("#target-content").load("scripts/gamecards.php?page=1");
    
    $(".page").click(function(){
        var id = $(this).attr("data-id");
        var select_id = parseInt($(this).parent().attr("id"));
        var next = select_id + 1;
        var prev = select_id - 1;
        $.ajax({
            url: "scripts/gamecards.php",
            type: "GET",
            data: {
                page : id
            },
            cache: false,
            success: function(dataResult){
                $("#target-content").html(dataResult);
                $(".pagenum").addClass("hidden");
                $("#"+select_id).removeClass("hidden");
                $("#"+next).removeClass("hidden");
                $("#"+prev).removeClass("hidden");                              
            }
        });
              
    });
    $("#first").click(function(){
        var select_id = parseInt($(this).parent().attr("id"));
        var page1 = select_id + 1;
        var page2 = select_id + 2;
        $.ajax({
           url: "scripts/gamecards.php",
           type: "GET",
           data: {
               page : 1
           },
           cache: false,
           success: function(dataResult){
               $("#target-content").html(dataResult);
               $(".pagenum").addClass("hidden");
               $("#"+page1).removeClass("hidden");
               $("#"+page2).removeClass("hidden");
            }      
        });  
         
    });
    $("#last").click(function(){
        var select_id = parseInt($(this).parent().attr("id"));
        var page1 = select_id - 1;
        var page2 = select_id - 2;
        $.ajax({
            url: "scripts/gamecards.php",
            type: "GET",
            data: {
                page : select_id -1
            },
            cache: false,
            success: function(dataResult){
                $("#target-content").html(dataResult);
                $(".pagenum").addClass("hidden");
                $("#"+page1).removeClass("hidden");
                $("#"+page2).removeClass("hidden");
            }
        }); 
    });   
});
