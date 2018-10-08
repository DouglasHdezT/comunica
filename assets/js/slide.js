
$(function(){

  $("#slideshow").slidesjs({
    height: $('#slideshow').height(),
    navigation: false,
    effect: {
      slide: {
        // Slide effect settings.
        speed: 500
          // [number] Speed in milliseconds of the slide animation.
      },
      fade: {
        speed: 500,
          // [number] Speed in milliseconds of the fade animation.
        crossfade: true
          // [boolean] Cross-fade the transition.
      }
    },
    play:{
        interval: 10000,
        auto:false,
        effect: "fade",
        pauseOnHover: true,
        restartDelay: 5000
    },

  });
});
$(function(){

  $("#slideshow-movil").slidesjs({
    height: $('#slideshow-movil').height(),
    navegation: true,
    effect: {
      slide: {
        // Slide effect settings.
        speed: 200
          // [number] Speed in milliseconds of the slide animation.
      },
      fade: {
        speed: 500,
          // [number] Speed in milliseconds of the fade animation.
        crossfade: true
          // [boolean] Cross-fade the transition.
      }
    },
    play:{
        interval: 10000,
        auto:true,
        effect: "fade",
        pauseOnHover: true,
        restartDelay: 5000
    },

  });
});
$(function(){
  $("#slideshow-medios").slidesjs({
    height: $('#slideshow-medios').height(),
    navegation: false,
    effect: {
      slide: {
        // Slide effect settings.
        speed: 200
          // [number] Speed in milliseconds of the slide animation.
      },
      fade: {
        speed: 500,
          // [number] Speed in milliseconds of the fade animation.
        crossfade: true
          // [boolean] Cross-fade the transition.
      }
    },
    play:{
        interval: 10000,
        auto:true,
        effect: "fade",
        pauseOnHover: true,
        restartDelay: 5000
    },

  });
});
$(function(){
  $("#slideshow-sections").slidesjs({
    height: $('#slideshow-sections').height(),
    navegation: false,
    effect: {
      slide: {
        // Slide effect settings.
        speed: 200
          // [number] Speed in milliseconds of the slide animation.
      },
      fade: {
        speed: 500,
          // [number] Speed in milliseconds of the fade animation.
        crossfade: true
          // [boolean] Cross-fade the transition.
      }
    },
    play:{
        interval: 10000,
        auto:false,
        effect: "fade",
        pauseOnHover: true,
        restartDelay: 5000
    },

  });
});
