$(document).ready(main);

$isDown = false;
$claseAbierta=null;

function main(){
var $counter = true;

    $(window).scroll(function(){
       var positionNav = $('.dark-blue-nav').offset().top + $('.dark-blue-nav').outerHeight();
       var position = window.scrollY;

        if(position > positionNav ){
            $('.logo-container a').css('display','none');
            $('.logo-container').append(createMenuScroll());
            /*Diseño de los li en menu desplegable*/
            $('ul.menu-scrolling > li').addClass('items-slide');
        }else{
            $('.dark-blue-nav-scrolling').remove();
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
    function showLastNew(){
        $clase = $(this).text().split(" ").join("_");
        if(!$isDown){
            $claseAbierta = $clase;
            $isDown = true;

            $('.'+$clase).slideDown('fast');

           }
        else if($isDown){

            if($clase == $claseAbierta){

                $('.'+$clase).slideUp('fast');
                $isDown =false;

            }
            else{

                $('.'+$claseAbierta).slideUp('fast');

                $('.'+$clase).slideDown('fast');

                $claseAbierta= $clase;
                $isDown = true;
            }
        }
    }
    $(".link-darknav").click(showLastNew);


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

function createMenuScroll(){
    var nav = document.createElement("nav");
    nav.className ="dark-blue-nav-scrolling";
    var div_menu = document.createElement("div");
    div_menu.className = "buttom";
    div_menu.id = "menu";
    var icon = document.createElement("span");
    icon.id ="menu-trigger";
    icon.style.top = "10px";
    icon.className = "button-gradient glyphicon glyphicon-menu-hamburger";
    icon.setAttribute("aria-hidden","true");
    var div_logo_nav = document.createElement("div");
    div_logo_nav.className="logo-nav";
    var logo = document.getElementById("magic-logo");
    
    nav.appendChild(div_menu);
    nav.appendChild(div_logo_nav);

    div_menu.appendChild(icon);
    div_logo_nav.appendChild(logo);

    return nav;
}


