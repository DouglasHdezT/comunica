$(document).ready(main);

$isDown = false;
$claseAbierta=null;

function main(){
var $counter = true;



    $(window).scroll(function(){
       var positionNav = $('.dark-blue-nav').offset().top + $('.dark-blue-nav').outerHeight();
       var position = window.scrollY;

        if(position > positionNav ){
            $('.dark-blue-nav-scrolling').slideDown('fast');
            /*Diseño de los li en menu desplegable*/
            $('ul.menu-scrolling > li').addClass('items-slide');
        }else{
            $('.dark-blue-nav-scrolling').slideUp('fast');
            $('.section-container-scrolling').slideUp('fast');
            $counter = true;
        }
    });

    $('.menu-scrolling > li').hover(function(){
        var text = $(this).children().text();
        var sec = text.split(" ");
        var full= " ";
        for($i = 0; $i < sec.length; $i++){
            var full = full + sec[$i].charAt(0);
        }
        $('.view').text(full);
    });

    $('div#menu , div#menu-movil').click(function(){
        if($counter){
            $('.section-container-scrolling').slideDown('fast');
            $('#menu-trigger').addClass('glyphicon-remove');
            $('#menu-trigger').removeClass('glyphicon-menu-hamburger');

            $counter = false;
        }else{
           $('.section-container-scrolling').slideUp('fast');
            $('#menu-trigger').removeClass('glyphicon-remove');
            $('#menu-trigger').addClass('glyphicon-menu-hamburger');
            $counter = true;
        }
    });

    $('.dark-blue-nav > .dark-ul > li > a').click(function(){
       $clase = $(this).text();
        console.log($clase);
    });

    $("#first-nav > div > ul > li > .link-darknav").click(function(event) {
      event.preventDefault();
    });

    $("#first-nav > div > ul > li > .link-darknav").click(function(){
        $clase = $(this).text().split(" ").join("_");
        if(!$isDown){
            $claseAbierta = $clase;
            $isDown = true;

            $('.'+$clase).slideDown('fast');
            $('.'+$clase).parent('li').css('background','rgb(28, 66, 109)');

           }
        else if($isDown){

            if($clase == $claseAbierta){

                $('.'+$clase).slideUp('fast');
                $(this).parent('li').css('background','#072844');
                $isDown =false;

            }
            else{

                $('.'+$claseAbierta).slideUp('fast');
                $('.'+$claseAbierta).parent('li').css('background','#072844');

                $('.'+$clase).slideDown('fast');
                $('.'+$clase).parent('li').css('background','rgb(28, 66, 109)');

                $claseAbierta= $clase;
                $isDown = true;
            }
        }
    });

    $("#first-nav > div > ul > li > ul > li > .link-darknav").click(function(event) {
      event.preventDefault();
    });



}

function pageimage(){


    $(document).ready(function() {
        console.log('TPM');
        $(document).scrollTop($('#first-nav').offset().top);
    });

}
