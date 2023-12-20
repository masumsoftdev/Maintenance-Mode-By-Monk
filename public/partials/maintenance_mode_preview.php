<?php

    $mmbm_info = get_option('mmbm_maintenance_options');

    $mmbm_heading           = isset($mmbm_info['heading']) ? stripslashes($mmbm_info['heading']) : '';
    $mmbm_description       = isset($mmbm_info['description']) ? stripslashes($mmbm_info['description']) : '';
    $mmbm_logo_url          = isset($mmbm_info['logo_url']) ? stripslashes($mmbm_info['logo_url']) : '';
    $mmbm_bg_color          = isset($mmbm_info['bg_color']) ? stripslashes($mmbm_info['bg_color']) : '';
    $mmbm_title_color       = isset($mmbm_info['title_color']) ? stripslashes($mmbm_info['title_color']) : '';
    $mmbm_description_color = isset($mmbm_info['description_color']) ? stripslashes($mmbm_info['description_color']) : '';

?>


<style>
    #mmbm_body_id {
    background-color: <?php echo $mmbm_bg_color; ?>;
    }

    #mmbm-maintenance-mode {
        position  : absolute;
        top       : 50%;
        left      : 50%;
        transform : translate(-50%, -50%);
        text-align: center;
    }

    #mmbm_logo_preview {
        width : 100px;
        height: 100px;
    }

    #mmbm-maintenance-mode h1 {
        font-size    : 50px;
        margin-bottom: 20px;
        color        : <?php echo $mmbm_title_color; ?>;
    }

    #mmbm-maintenance-mode p {
        font-size: 16px;
        margin   : 10px 0;
        color    : <?php echo $mmbm_description_color; ?>;
    }

</style>

<div id="mmbm_body_id">
    <div id="mmbm-maintenance-mode">

    <?php
        if(isset( $mmbm_logo_url) && $mmbm_logo_url != ''){

    ?>
    <img src="
        <?php
    
            echo  $mmbm_logo_url;
       
        ?>" alt="" id="mmbm_logo_preview"> 
        
   <?php } ?>
        <h1><?php echo $mmbm_heading; ?></h1>
        <p><?php echo $mmbm_description; ?></p>
    </div>

</div>

<?php


