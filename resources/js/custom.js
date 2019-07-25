jQuery(document).ready(function($) {

  var position = $(window).scrollTop(); 

  // should start at 0
  
  $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if(scroll > position) {
          // Scroll down
          $( '#navigation-fix' ).css( 'display','none').animate({marginTop:-60}, 0);
      } else {
           // Scroll Up
           $( '#navigation-fix' ).stop().css("display", "flex").animate({marginTop:0}, 100);
      }
      position = scroll;

      if(position==0){
        $( '#navigation-fix' ).stop().fadeOut(200);
      }
  });


  // menu mobile

  //menuButton
  //

  $('#menuButton').click(function () { 
  
    $('#navigation-mobile').toggleClass('mostrarMenu mostrarMenuOff');
});


  });


