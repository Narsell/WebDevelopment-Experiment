
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