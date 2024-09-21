<?php

    require 'admin_server_files/header_server_validate.php';


    $isSuccess = false;

    $timer_of_ads = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        // $profile_picture = stringPostReturn("");
        $timer_of_ads = intval(stringPostReturn("timer_of_ads"));
        // sysout("Timer of ads : " . $timer_of_ads);









        $directoryOfFile = 'ads_timer.php';


$stringToAssign =
'<?php
$ads_timer = '. $timer_of_ads .';
?>
';



        $myfile = fopen($directoryOfFile, "w") or die("Unable to open file!");
        fwrite($myfile, $stringToAssign);
        fclose($myfile);





    }

    // if($isSuccess){
    //     echo "Executed";
    // }
    //



    // Go To Page
    header("Location: home");



 ?>
