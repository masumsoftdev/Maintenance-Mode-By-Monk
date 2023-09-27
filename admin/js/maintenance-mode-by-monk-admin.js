(function( $ ) {

    $(document).ready(function() {
        var isChecked = true;
        $('.switch input').click(function() {
          if(isChecked == true){
            $('.on_off_text').text('OFF');
            isChecked = false;
          }else{
            $('.on_off_text').text('ON');
            isChecked = true;
          }
        });
    });
	

})( jQuery );
