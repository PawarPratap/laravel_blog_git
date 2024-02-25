
$(document).ready(function(){
    $("#logoutButton").click(function(e){ 
        $.post({
            url: "/api/logout",
            success: function() {
                window.location.href = "/";
            },
            error: function() {
                console.log("found error at logout");
            }
        });
    });

    $("navbar-nav a.active").removeClass("active");
    $(".navbar-nav a[href='" + location.href + "']").addClass("active");

});