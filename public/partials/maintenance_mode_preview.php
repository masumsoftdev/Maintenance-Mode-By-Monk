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

$mmbs_heading = $mmbs_info['heading'];
$mmbs_description = $mmbs_info['description'];
?>

<div id="mmbm-maintenance-mode">
        <h1><?php echo $mmbs_heading ? $mmbs_heading: '' ?></h1>
        <p><?php echo $mmbs_description ? $mmbs_description : '' ?></p>
</div>

<?php


