$(document).ready(function() {
    $("#top").css("overflow-y", "hidden")
    $("#switch").prop("checked", false);
});

function switchFunction() {
    var checkBox = document.getElementById("switch");
    var page = document.getElementById("content");
    if (checkBox.checked == true) {
        $("#content").fadeTo("slow", 1);
        var hash = "#after-switch";

        $('html, body').delay(300).animate({
            scrollTop: $(hash).offset().top
        }, 800, function() {

            window.location.hash = hash;
            history.replaceState(null, null, ' ');
        });
        $("#top").css("overflow-y", "auto");
    } else {
        $("#content").fadeTo("slow", 0);
        var hash2 = "#top";

        $('html, body').delay(300).animate({
            scrollTop: $(hash2).offset().top
        }, 800, function() {

            window.location.hash = hash2;
            history.replaceState(null, null, ' ');
        });
        $("#top").css("overflow-y", "hidden");
    }
};
