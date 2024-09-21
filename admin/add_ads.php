<?php

    require 'admin_server_files/header_server_validate.php';


    $isSuccess = false;

    $url_shortlink = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        // $profile_picture = stringPostReturn("");
        $url_shortlink = stringPostReturn("url_shortlink");
        // sysout("URL Shortlink : " . $url_shortlink);







        $stmt = $conn->prepare('INSERT INTO all_ads ( url_shortlink) VALUES (?);');
        $stmt->bind_param("s", $url_shortlink);
        if($stmt->execute()){
            $isSuccess = true;
        }




    }

    if($isSuccess){
        echo "Executed";
    }




    // Go To Page
    header("Location: home");



 ?>
