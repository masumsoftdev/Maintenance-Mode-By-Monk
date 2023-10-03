<?php
?>

<style>
    #mmbm-maintenance-mode {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

#mmbm_logo_preview{
    width: 100px;
    height: 100px;
}

#mmbm-maintenance-mode h1 {
    font-size: 50px;
    margin-bottom: 20px;
}

#mmbm-maintenance-mode p {
    font-size: 16px;
    margin: 10px 0;
}
</style>


<?php
    $mmbs_info = get_option( 'mmbm_maintenance_options' );

    $mmbs_heading = stripslashes($mmbs_info['heading']);
    $mmbs_description = stripslashes($mmbs_info['description']);
    $logo_url = stripslashes($mmbs_info['logo_url']);
?>

<div id="mmbm-maintenance-mode">
        <img id="mmbm_logo_preview" src="<?php echo $logo_url; ?>">
        <h1><?php echo $mmbs_heading ? $mmbs_heading: '' ?></h1>
        <p><?php echo $mmbs_description ? $mmbs_description : '' ?></p>
</div>

<?php


