(function( $ ) {

    /** Enable Disable Swticher Checkbox */
    $(document).ready(function() {
        var isEnable = true;
        $('.switch input').click(function() {
          if(isEnable == true){
            $('.on_off_text').text('OFF');
            isEnable = false;
          }else{
            $('.on_off_text').text('ON');
            isEnable = true;
          }
        });
      });

    /** Ajax Data Save */

    $('#mmbm_enable_disable').change(function (){
      var isChecked = $(this).is(':checked');
      $.ajax({
          type: 'POST',
          url: mmbm_option_enable_disable_object.ajax_url,
          data: {
              action: 'mmbm_ajax_action',
              is_checked: isChecked ? 'on' : 'off',
              nonce: mmbm_option_enable_disable_object.nonce,
          },
          success: function(res) {
            $('#on_off_text_update_notice').text(res);
            setTimeout(() => {
              $('#on_off_text_update_notice').text('');
            }, 1500);
            
           
          },
      });
  });
  

  
 

})( jQuery );
