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
                <label class="switch">
                    <input type="checkbox" name="checkbox" id="mmbm_enable_disable" checked>
                    <span class="slider round"></span>
                </label>
                <span class="on_off_text">ON</span>
                <p id="on_off_text_update_notice"></p>
        </div>

        <div class="wrap mmbm_info_form">
            <?php
                $mmbs_info = get_option( 'mmbm_maintenance_options' );

                $mmbs_heading = stripslashes($mmbs_info['heading']);
                $mmbs_description = stripslashes($mmbs_info['description']);
                $logo_url = stripslashes($mmbs_info['logo_url']);
                $bg_color = stripslashes($mmbs_info['bg_color']);
                $title_color = stripslashes($mmbs_info['title_color']);
                $description_color = stripslashes($mmbs_info['description_color']);
                $description_color = stripslashes($mmbs_info['description_color']);
                $datetime = stripslashes($mmbs_info['datetime']);
            ?>

            <form method="post" action="">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_heading"><?php echo __('Title:', 'maintenance-mode-by-monk') ?></label></th>
                            <td><input name="mmbm_maintenanace_heading" type="text" id="mmbm_maintenanace_heading" value="<?php echo $mmbs_heading ? $mmbs_heading:'' ?>" class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_title_color"><?php echo __('Title Color:', 'maintenance-mode-by-monk') ?></label></th>
                            <td> <input type="color" value="<?php echo $title_color ? $title_color : '' ?>" name="mmbm_maintenanace_title_color" id="mmbm_maintenanace_title_color"> </td>
                           
                        </tr>

                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_description"><?php echo __('Description:', 'maintenance-mode-by-monk') ?></label></th>
                            <td><input name="mmbm_maintenanace_description" type="text" id="mmbm_maintenanace_description" value="<?php echo $mmbs_description ? $mmbs_description : '' ?>" class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_description_color"><?php echo __('Description Color:', 'maintenance-mode-by-monk') ?></label></th>
                            <td> <input type="color" value="<?php echo $description_color ? $description_color : '' ?>" name="mmbm_maintenanace_description_color" id="mmbm_maintenanace_description_color"> </td>
                           
                        </tr>
                        <tr>
                            <th scope="row"></th>  
                            <td><img src="<?php
                            if(isset($logo_url)){
                                echo $logo_url;
                            }else{
                                echo MMBM_URL. 'admin/img/mmbm-no-logo-icon.png'; 
                            }
                             
                             ?>" alt="" id="mmbm_logo_preview"></td>    
                        </tr>

                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_logo"><?php echo __('Logo:', 'maintenance-mode-by-monk') ?></label></th>
                            <td><button type="button" id="mmbm_maintenanace_logo"><?php echo __('Update logo', 'maintenance-mode-by-monk') ?></button></td>
                           
                        </tr>
                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_bg_color"><?php echo __('Background Color:', 'maintenance-mode-by-monk') ?></label></th>
                            <td> <input type="color" value="<?php echo $bg_color ? $bg_color : '' ?>" name="mmbm_maintenanace_bg_color" id="mmbm_maintenanace_bg_color"> </td>
                           
                        </tr>
                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_datetime"><?php echo __('Keep in Maintenance until:', 'maintenance-mode-by-monk') ?></label></th>
                            <td> <input type="datetime-local" value="<?php echo $datetime ? $datetime : '' ?>" name="mmbm_maintenanace_datetime" id="mmbm_maintenanace_datetime"> </td>
                           
                        </tr>
                    </tbody>
                </table>
                <input type="submit" id="mmbm_submit" class="button button-primary" value="Save Changes">
                <p id="others_text_update_notice"></p>
            </form>    
        </div>
        <?php 

       
        $markup = ob_get_clean();

        return $markup;
    }



}