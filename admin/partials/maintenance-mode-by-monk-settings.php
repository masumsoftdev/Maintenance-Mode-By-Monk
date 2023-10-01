<?php

class Mmbm_Settings{
    public function __construct(){
        add_action( 'admin_init', [$this, 'mmbm_loading_settings_markup'] );
    }

    public static function mmbm_loading_settings_markup(){ 

        ob_start();
        ?>
         <div class="wrap">
            <h1 class="wp-heading-inline"> Maintenance Mode by MONK - Settings</h1>
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
            ?>

            <form method="post" action="">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_heading">Maintenance Title:</label></th>
                            <td><input name="mmbm_maintenanace_heading" type="text" id="mmbm_maintenanace_heading" value="<?php echo $mmbs_heading ? $mmbs_heading:'' ?>" class="regular-text"></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="mmbm_maintenanace_description">Maintenance Description:</label></th>
                            <td><input name="mmbm_maintenanace_description" type="text" id="mmbm_maintenanace_description" value="<?php echo $mmbs_description ? $mmbs_description : '' ?>" class="regular-text"></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" id="mmbm_submit" class="button button-primary" value="Save Changes">
            </form>    
        </div>
        <?php 

       
        $markup = ob_get_clean();

        return $markup;
    }



}