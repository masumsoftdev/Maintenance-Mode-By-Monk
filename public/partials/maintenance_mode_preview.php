<?php

$mmbs_info = get_option( 'mmbm_maintenance_options' );

$mmbs_heading = stripslashes($mmbs_info['heading']);
$mmbs_description = stripslashes($mmbs_info['description']);
$logo_url = stripslashes($mmbs_info['logo_url']);
$bg_color = stripslashes($mmbs_info['bg_color']);
$title_color = stripslashes($mmbs_info['title_color']);
$description_color = stripslashes($mmbs_info['description_color']);
?>




<!DOCTYPE html>
<head>

        <style>
        #mmbm_body_id{
            background-color: <?php echo $bg_color ? $bg_color : ''; ?>;
        }
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
            color: <?php echo $title_color ? $title_color : '' ?>;
        }

        #mmbm-maintenance-mode p {
            font-size: 16px;
            margin: 10px 0;
            color: <?php echo $description_color ? $description_color : '' ?>;
        }
    </style>
</head>
<body id="mmbm_body_id">
    <div id="mmbm-maintenance-mode">
            <img id="mmbm_logo_preview" src="<?php echo $logo_url; ?>">
            <h1><?php echo $mmbs_heading ? $mmbs_heading: '' ?></h1>
            <p><?php echo $mmbs_description ? $mmbs_description : '' ?></p>
            <div id="countdown"></div>
    </div>








    <script>
         const targetDate = new Date('2024-01-01T12:00:00').getTime();

        // Update the countdown every 1 second
        const countdownInterval = setInterval(function() {
            const currentDate = new Date().getTime();
            const timeRemaining = targetDate - currentDate;

            if (timeRemaining <= 0) {
                clearInterval(countdownInterval); // Stop the countdown when the target time is reached
                document.getElementById('countdown').innerHTML = "Countdown expired!";
            } else {
                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                document.getElementById('countdown').innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
            }
        }, 1000);
    </script>
</body>
</html>



<?php


