<?php

    require '../admin_server_files/modules.php';
    require '../admin_server_files/connectserver.php';


    $error_on_image = false;
    $isSuccess = false;

    $tagName = "section_modern_music_meta";
    $data1 = $data2 = $data3 = $data4 = $data5 = NULL;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $data1 = stringPostReturn("data1");
        $data2 = stringPostReturn("data2");
        $data3 = stringPostReturn("data3");
        $data4 = stringPostReturn("data4");
        $data5 = stringPostReturn("data5");



        $stmt = $conn->prepare('UPDATE homepage SET data1 = ?, data2 = ?, data3 = ?, data4 = ?, data5 = ? WHERE tag = ?;');
        $stmt->bind_param("ssssss", $data1, $data2, $data3, $data4, $data5, $tagName);
        if($stmt->execute()){
            $isSuccess = true;
            // echo "Success Changed";
        }




    }





    // Go To Page
    if($isSuccess) header("Location: ../home");



 ?>
