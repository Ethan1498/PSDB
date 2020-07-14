$(document).ready(function(){
    $(".favBtn").on("click", function () {
        $(this).toggleClass("rotate");
    });

    $("#consoles").click(function(){
        $("#cons-list").toggle();
    });
});

$(document).on('click', function (e) {
    if ($(e.target).closest("#consoles").length === 0) {
        $("#cons-list").hide();
    };
  });