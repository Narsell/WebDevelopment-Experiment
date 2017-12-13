$(function() {
  $('.top').hover(function() {
    
    $('.top').css('opacity', '0');
    $('.bottom').css('opacity', '1');
    
  }, function() {
    
    $('.top').css('opacity', '1');
    $('.bottom').css('opacity', '0');
  });
});

$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll>=1)
      {
       $(".navbar").addClass("fixed-navbar");
       $(".navbar").removeClass("top-navbar");
      }
    else
      {
       $(".navbar").addClass("top-navbar");
       $(".navbar").removeClass("fixed-navbar");
      }
  
});