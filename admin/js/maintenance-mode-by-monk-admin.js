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
      // var isChecked = $(this).is(':checked');
      mmbm_sending_ajax_request('enable_disable');
    });

      function mmbm_sending_ajax_request(custom_action){
        var isChecked = $('#mmbm_enable_disable').is(':checked');
        var requestData = {
          action: 'mmbm_ajax_action',
          custom_action: custom_action,
          isChecked : isChecked
        
        };

        console.log(requestData)

          $.ajax({
            type: 'POST',
            url: mmbm_option_object.ajax_url, 
            nonce: mmbm_option_object.nonce,
            data: requestData,
            success: function(res) {

                // if (action === 'enable_disable') {

                //   $('#on_off_text_update_notice').text(res);
                //   setTimeout(() => {
                //     $('#on_off_text_update_notice').text('');
                //   }, 1500);

                // } else if (action === 'action2') {

                // }
    
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
      }
 


  // /** Dealing Others Options */

  // $('#mmbm_submit').on('click', function (e){
  //   e.preventDefault();

  //   var mmbm_maintenanace_heading = $('#mmbm_maintenanace_heading').val();
  //   var mmbm_maintenanace_description = $('#mmbm_maintenanace_description').val();

  //   $.ajax({
  //     type: 'POST',
  //     url: mmbm_option_enable_disable_object.ajax_url,
  //     data: {
  //         action: 'mmbm_ajax_action',
  //         heading: mmbm_maintenanace_heading,
  //         description: mmbm_maintenanace_description,
  //         nonce: mmbm_option_enable_disable_object.nonce,
  //     },
  //     success: function(res) {
  //       // $('#on_off_text_update_notice').text(res);
  //       // setTimeout(() => {
  //       //   $('#on_off_text_update_notice').text('');
  //       // }, 1500);
        
       
  //     },
  // });
    
  // });
  

  
 

})( jQuery );
