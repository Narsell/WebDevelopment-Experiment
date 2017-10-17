    $(document).ready(function()
      {
            $(".navbar").affix({offset: {top: $("header").outerHeight(true)} });
        

            $(".navbar").on('affix.bs.affix', function()
            {  
              $("#affix_box").show();

            });

            $(".navbar").on('affix-top.bs.affix', function()
            {  
              $("#affix_box").hide();

            });    
     });
    
