
  $(window).on('beforeunload', function() {
    $('body').hide();
    $(window).scrollTop(0);

   


  });



  $(function () {
    $(document).scroll(function () {
      var $nav = $(".nav");
      $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
  });




    

         

    


    $('#clicker').click(function() {
      
            if ($('#save').attr('disabled')) {
                $('#save').prop('disabled', false);
                $('input').prop ('disabled', false);
                $('#Location').prop('disabled', true);
            }
            else {
                $('#save').prop('disabled', true);
                $('input').prop('disabled', true);
                
            }
        });
  
    
    





  

   

   

        

   


    





