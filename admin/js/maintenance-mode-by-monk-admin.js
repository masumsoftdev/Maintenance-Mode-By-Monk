(function( $ ) {

    /** Enable Disable Swticher Checkbox */
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

    /** Ajax Data Save */

//     $.ajax({
//         type: 'POST',
//         url: mmbm_option_enable_disable_object.ajax_url,
//         data: {
//             action: 'mmbm_ajax_action', // Action hook to trigger the callback
//             nonce: mmbm_option_enable_disable_object.nonce, // Include the nonce in the data
//             // Additional data can be added here as key-value pairs
//         },
//         success: function(response) {
//             // Handle the AJAX response
//             var data = JSON.parse(response);
//             alert(data.message);
//         },
//     });
	

})( jQuery );
