(function( $ ) {

    /** Enable Disable Swticher Checkbox */
    $(document).ready(function() {
        var isEnable = true;
        $('.mmbm_switch input').click(function() {
          if(isEnable == true){
            $('.mmbm_on_off_text').text('OFF');
            isEnable = false;
          }else{
            $('.mmbm_on_off_text').text('ON');
            isEnable = true;
          }
        });

        /** Removing Image */

        $('#mmbm_remove_image').click(function () {
            $('#mmbm_logo_preview').hide();
            $(this).hide();
        });

      });

    /** Ajax Data Save */

    $('#mmbm_enable_disable').change(function (){
      mmbm_sending_ajax_request('enable_disable');
    });

    $('#mmbm_submit').click(function (e){
      e.preventDefault();
      mmbm_sending_ajax_request('send_input_values');
    });

      function mmbm_sending_ajax_request(custom_action){
        var isChecked = $('#mmbm_enable_disable').is(':checked');

        var mmbm_maintenanace_heading           = $('#mmbm_maintenanace_heading').val();
        var mmbm_maintenanace_description       = $('#mmbm_maintenanace_description').val();
        var mmbm_maintenanace_bg_color          = $('#mmbm_maintenanace_bg_color').val();
        var mmbm_maintenanace_title_color       = $('#mmbm_maintenanace_title_color').val();
        var mmbm_maintenanace_description_color = $('#mmbm_maintenanace_description_color').val();
        var mmbm_maintenanace_datetime          = $('#mmbm_maintenanace_datetime').val();
        var mmbm_logo_preview_link              = $('#mmbm_logo_preview').attr('src');
        var requestData                         = {
          action           : 'mmbm_ajax_action',
          custom_action    : custom_action,
          isChecked        : isChecked,
          heading          : mmbm_maintenanace_heading,
          description      : mmbm_maintenanace_description,
          logo_url         : mmbm_logo_preview_link,
          bg_color         : mmbm_maintenanace_bg_color,
          title_color      : mmbm_maintenanace_title_color,
          description_color: mmbm_maintenanace_description_color,
          datetime         : mmbm_maintenanace_datetime
        
        };

          $.ajax({
            type   : 'POST',
            url    : mmbm_option_object.ajax_url,
            nonce  : mmbm_option_object.nonce,
            data   : requestData,
            success: function(res) {

                if (custom_action === 'enable_disable') {

                  $('#mmbm_on_off_text_update_notice').text(res);
                  setTimeout(() => {
                    $('#mmbm_on_off_text_update_notice').text('');
                  }, 1500);

                }
                
                if(custom_action === 'send_input_values'){
                  $('#mmbm_others_text_update_notice').text(res);
                  setTimeout(() => {
                    $('#mmbm_others_text_update_notice').text('');
                  }, 1500);
                } 
    
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
      }



     //Manage the Image 

     $(document).on("click", "#mmbm_maintenanace_logo", function (e) {
      e.preventDefault();
      var image = wp.media({
          title   : "Upload Maintenance Page Logo",
          multiple: false,
        })
        .open()
        .on("select", function (e) {
          var upload_image = image.state().get("selection").first();
          var imagejson    = upload_image.toJSON();
          $("#mmbm_logo_preview").attr("src", imagejson.url);
        });
    });
 

    // Set Trigger
    $('#mmbm_logo_preview').click(function (){
      $('#mmbm_maintenanace_logo').trigger('click');
    });

})( jQuery );
