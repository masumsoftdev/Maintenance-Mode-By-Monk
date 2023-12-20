<?php

class Mmbm_Settings{
    public function __construct(){
        add_action( 'admin_init', [$this, 'mmbm_loading_settings_markup'] );
    }

    public static function mmbm_loading_settings_markup(){ 

        ob_start();
        ?>
         <div class="wrap">
            <h1 class="wp-heading-inline"> Maintenance Mode by MONK - Settings </h1>
            <hr>
            <div>
                <label class="mmbm_switch">
                    <input type="checkbox" name="checkbox" id="mmbm_enable_disable" checked>
                    <span class="mmbm_slider round"></span>
                </label>
                <span class="mmbm_on_off_text">ON</span>
                <p id="mmbm_on_off_text_update_notice"></p>
        </div>

        <div class="wrap mmbm_info_form">
            <?php
                $mmbm_info              = get_option('mmbm_maintenance_options');
                $mmbm_heading           = isset($mmbm_info['heading']) ? stripslashes($mmbm_info['heading']) : 'We are in Maintenance';
                $mmbm_description       = isset($mmbm_info['description']) ? stripslashes($mmbm_info['description']) : 'Please check back later. Thank you for your patience!';
                $mmbm_logo_url          = isset($mmbm_info['logo_url']) ? stripslashes($mmbm_info['logo_url']) : '';
                $mmbm_bg_color          = isset($mmbm_info['bg_color']) ? stripslashes($mmbm_info['bg_color']) : '';
                $mmbm_title_color       = isset($mmbm_info['title_color']) ? stripslashes($mmbm_info['title_color']) : '';
                $mmbm_description_color = isset($mmbm_info['description_color']) ? stripslashes($mmbm_info['description_color']) : '';
                
            ?>

            <form method="post" action="">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_heading"><?php echo __('Title:', 'maintenance-mode-by-monk') ?></label></th>
                            <td><input name="mmbm_maintenanace_heading" type="text" id="mmbm_maintenanace_heading" value="<?php echo $mmbm_heading; ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_title_color"><?php echo __('Title Color:', 'maintenance-mode-by-monk') ?></label></th>
                            <td> <input type="color" value="<?php echo $mmbm_title_color; ?>" name="mmbm_maintenanace_title_color" id="mmbm_maintenanace_title_color"> </td>
                           
                        </tr>

                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_description"><?php echo __('Description:', 'maintenance-mode-by-monk') ?></label></th>
                            <td><input name="mmbm_maintenanace_description" type="text" id="mmbm_maintenanace_description" value="<?php echo $mmbm_description ; ?>" class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_description_color"><?php echo __('Description Color:', 'maintenance-mode-by-monk') ?></label></th>
                            <td> <input type="color" value="<?php echo $mmbm_description_color; ?>" name="mmbm_maintenanace_description_color" id="mmbm_maintenanace_description_color"> </td>
                           
                        </tr>
                        <tr>
                            <th scope="row"></th>  
                            <td><img src="
                            <?php
                            if(isset($ $mmbm_logo_url)){
                                echo $ $mmbm_logo_url;
                            }else{
                                echo MMBM_URL. 'admin/img/mmbm_image_maintanence_image.jpg'; 
                            }
                             
                             ?>" alt="" id="mmbm_logo_preview">
                             </td>
                             <td><button id="mmbm_remove_image">Remove Image</button></td>    
                        </tr>

                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_logo"><?php echo __('Logo:', 'maintenance-mode-by-monk') ?></label></th>
                            <td><button type="button" id="mmbm_maintenanace_logo"><?php echo __('Update logo', 'maintenance-mode-by-monk') ?></button></td>
                           
                        </tr>
                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_bg_color"><?php echo __('Background Color:', 'maintenance-mode-by-monk') ?></label></th>
                            <td> <input type="color" value="<?php echo $mmbm_bg_color; ?>" name="mmbm_maintenanace_bg_color" id="mmbm_maintenanace_bg_color"> </td>  
                        </tr>
                    </tbody>
                </table>
                <input type="submit" id="mmbm_submit" class="button button-primary" value="Save Changes">
                <p id="mmbm_others_text_update_notice"></p>
            </form>    
        </div>
        <?php 

       
        $markup = ob_get_clean();

        return $markup;
    }



}