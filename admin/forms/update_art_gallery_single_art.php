<?php

    require '../admin_server_files/modules.php';
    require '../admin_server_files/connectserver.php';


    $error_on_image = false;
    $isSuccess = false;

    $data1 = $data2 = $data3 = $data4 = $data5 = NULL;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $tagName = stringPostReturn("tagName");
        $data1 = stringPostReturn("data1");
        $data2 = stringPostReturn("data2");
        $data3 = stringPostReturn("data3");
        $data4 = stringPostReturn("data4");
        $data5 = stringPostReturn("data5");



        if($_FILES["fileToUpload"]["size"]>0){


            // Check the image and upload the image
            $target_dir = __DIR__ . '/../../assets/official/';
            echo $target_dir . "<br>";
            $target_file = basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


            $filenameforserver = preg_replace("/[^a-zA-Z0-9.]+/", "", $target_file);
            $filenameforserver = pathinfo($filenameforserver, PATHINFO_FILENAME) . base_convert(round(microtime(true)), 10, 30) . "." . $imageFileType;
            $target_file_name = $target_dir . $filenameforserver;


            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if($check == false) $error_on_image = true;
            if (file_exists($target_dir . $filenameforserver)) $error_on_image = true;
            if ($_FILES["fileToUpload"]["size"] > 500000000) $error_on_image = true;  // 5000 KB LIMIT

           
            if (!$error_on_image) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_name)) {
                    // echo "The file ". $filenameforserver. " has been uploaded.<br>";
                    $data4 =  $filenameforserver;

                    $stmt = $conn->prepare('UPDATE homepage SET data1 = ?, data2 = ?, data3 = ?, data4 = ?, data5 = ? WHERE tag = ?;');
                    $stmt->bind_param("ssssss", $data1, $data2, $data3, $data4, $data5, $tagName);
                    if($stmt->execute()){
                        $isSuccess = true;
                        // echo "Success Changed";
                    }

                }
            }


            
            


        }else{
            $stmt = $conn->prepare('UPDATE homepage SET data1 = ?, data2 = ?, data3 = ?, data5 = ? WHERE tag = ?;');
            $stmt->bind_param("sssss", $data1, $data2, $data3, $data5, $tagName);
            if($stmt->execute()){
                $isSuccess = true;
            }
        }


        




    }





    // Go To Page
    if($isSuccess) header("Location: ../home");



 ?>
