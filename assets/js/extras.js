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
    
    $(".seconds-post").hover(function(){
        $(this).children(".post-container").children(".center-full-slide-second-posts").fadeIn();
    },function(){
        $(this).children(".post-container").children(".center-full-slide-second-posts").fadeOut();
    });
    
    $(".first-post").hover(function(){
        $(this).children(".container-post").children(".center-full-slide-second-posts").fadeIn();
    },function(){
        $(this).children(".container-post").children(".center-full-slide-second-posts").fadeOut();
    });
    $(".container-post").hover(function(){
        $(this).children(".center-full-slide").fadeIn();
    },function(){
        $(this).children(".center-full-slide").fadeOut();
    });
    for(i=0;i<2;i++){
        $('#play-'+i).on('click', function(ev) {
            if($("#text-"+i).is(':visible')){
               $("#video-"+i)[0].src += "&autoplay=1";
               $("#video-"+i).removeClass("filter-off");
               $("#text-"+i).fadeOut(); 
               ev.preventDefault();
   
               $('#play-'+i).animate({
                  bottom:"+=30%",
                  opacity:".5"    
               });
   
               $('#play-'+i+' > span').removeClass("glyphicon-play");
               $('#play-'+i+' > span').addClass("glyphicon-stop");
            }else{
               $('#video-'+i)[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
               $("#text-"+i).fadeIn();
               $("#video-"+i).addClass("filter-off");
               $('#play-'+i).animate({
                  bottom:"-=30%",
                  opacity:"1"    
               });
               $('#play-'+i+' > span').addClass("glyphicon-play");
               $('#play-'+i+' > span').removeClass("glyphicon-stop");
            }
           
         });
    }
    
    
    
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

    $('#skip-banner').click(function(){
        $('html,body').animate({
            scrollTop: $('.logo-container').offset().top
        },1000);
    });

    
    
    
}