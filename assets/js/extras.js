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
        $(this).children(".material-container").children("a").children(".center-full-slide").fadeIn();
    },function(){
        $(this).children(".material-container").children("a").children(".center-full-slide").fadeOut();
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

      $('#play-1').on('click', function(ev) {
        if($("#text-1").is(':visible')){
           $("#video-1")[0].src += "&autoplay=1";
           $("#video-1").removeClass("filter-off");
           $("#text-1").fadeOut(); 
           ev.preventDefault();

           $('#play-1').animate({
              bottom:"+=30%",
              opacity:".5"    
           });

           $('#play-1 > span').removeClass("glyphicon-play");
           $('#play-1 > span').addClass("glyphicon-stop");
        }else{
           $('#video-1')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
           $("#text-1").fadeIn();
           $("#video-1").addClass("filter-off");
           $('#play-1').animate({
              bottom:"-=30%",
              opacity:"1"    
           });
           $('#play-1 > span').addClass("glyphicon-play");
           $('#play-1 > span').removeClass("glyphicon-stop");
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

    $('#skip-banner').click(function(){
        $('html,body').animate({
            scrollTop: $('.logo-container').offset().top
        },1000);
    });
    $('#delete-add').click(()=>{
        $(".comunica-ads")[0].remove();
    });

    
    
    
}