
var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.6.0.min.js';
document.getElementsByTagName('head')[0].appendChild(script);


function showMenu(menu) {

    var angle = '0deg',
      slide = '300px';
  
    if (menu) {
      angle = '180deg';
      slide = '0';
    }
  
    // Slide panel
    $("#menu__panel").css({
      transform: "translateX(" + slide + ")"
    });
  
    // Rotate icon
    setTimeout(function() {
      $("#menu__close").css({
        transform: "rotate(" + angle + ")"
      });
    }, 300);
  
    // Animate menu items
    $(".menu-item").each(function(i) {
      var row = $(this);
      setTimeout(function() {
        menu && row.addClass('fadeInDown');
        !menu && row.removeClass('fadeInDown');
      }, 100 * i);
    });
  
  }