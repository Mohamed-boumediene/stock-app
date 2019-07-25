
$(document).ready(function(){
    $(window).scroll(function() { // check if scroll event happened
        if ($(document).scrollTop() > 50) { // check if user scrolled more than 50 from top of the browser window
           $(".navbar-dark").css("background-color", "rgba(0, 171, 203, 0.72)"); // if yes, then change the color of class "navbar-fixed-top" to white (#f8f8f8)
        } else {
            $(".navbar-dark").css("background-color", "transparent"); // if not, change it back to transparent
        }
    });
});


//slide carisoul 1000= 1 second = 1000 * 60 = 1 minute
$(function () {
    $('#carouselExampleIndicators').carousel({
        interval: 1000 * 17

    }).bind('slide', function () {
        console.log("ended video ");

    });
});