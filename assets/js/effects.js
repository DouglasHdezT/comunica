$(function() {
    $(window).on('scroll', function() {
        $('.movimiento-arriba').css('margin-top', $(window).scrollTop() * -.3);
    });
});

$(function() {
    $(window).on('scroll', function() {
        $('.movimiento-abajo').css('margin-top', $(window).scrollTop() * .3);
    });
});

$(document).ready(()=>{
    var fisrtHeight = $('.down-slide').height();
    console.log(fisrtHeight);
    $('.main-slider').height($(window).height() - fisrtHeight);
});
