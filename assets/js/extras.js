$(document).ready(main);

function main(){
    var $screen = $(window).height();
    
    $(window).on('load',function(){
       $('#preloader').fadeOut(); 
    });
    
    $(".slider-container").hover(function(){
        $(this).children(".center-full-slide").fadeIn();
    },function(){
         $(this).children(".center-full-slide").fadeOut();
    });
    
    $(".crop-image").hover(function(){
       $(this).css("transform","scale(1.3)"); 
    });
     $('#play-0').on('click', function(ev) {
         if($("#text-0").is(':visible')){
            $("#video-0")[0].src += "&autoplay=1";
            $("#video-0").removeClass("filter-off");
            $("#text-0").fadeOut(); 
            ev.preventDefault();

            $('#play-0').animate({
               bottom:"+=30%",
               opacity:".5"    
            });

            $('#play-0 > span').removeClass("glyphicon-play");
            $('#play-0 > span').addClass("glyphicon-stop");
         }else{
            $('#video-0')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
            $("#text-0").fadeIn();
            $("#video-0").addClass("filter-off");
            $('#play-0').animate({
               bottom:"-=30%",
               opacity:"1"    
            });
            $('#play-0 > span').addClass("glyphicon-play");
            $('#play-0 > span').removeClass("glyphicon-stop");
         }
        
      });
    
    
    
    $('.toggle-trigger').click(function(){
        if($(this).children('.toggle').is(':hidden')){
            $(this).children('#trigger').removeClass('glyphicon-chevron-down');
            $(this).children('#trigger').addClass('glyphicon-chevron-up');
           $(this).children('.toggle').slideToggle();

        }else{
            $(this).children('#trigger').removeClass('glyphicon-chevron-up')
            $(this).children('#trigger').addClass('glyphicon-chevron-down'); 
           $(this).children('.toggle').slideToggle();

        }
       
    });
    
    $('.arrow-down').click(function(){
        var homeP = $('#first-nav').offset().top;
        $('html, body').animate({
           scrollTop: homeP 
        }, 'slow');
    });
    
    $('.prevent').click(function(event){
        event.preventDefault();
    });
    
    $counter = 0;
    $(window).scroll(function(){
        var Position = window.scrollY;
        if(Position>$('#first-nav').offset().top){
            $('.ScrollUp').fadeIn('fast');
        }else{
           $('.ScrollUp').fadeOut('fast'); 
        }
    });
    $('.ScrollUp').click(function(){
        var homeP = $('#first-nav').offset().top;
        $('html, body').animate({
           scrollTop:homeP 
        }, 'slow');
    });
    
    
    
}