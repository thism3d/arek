<?php

    require '../admin_server_files/header_server_validate.php';


    $error_on_image = $error_on_pdf = false;
    $isSuccess = false;

    $addTagCategory = "mission_book_item";
    $data1 = $data2 = $data3 = $data4 = $data5 = NULL;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {



        $sql = 'SELECT * FROM homepage;';
        $result = $conn->query($sql);

        $homepage = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $homepage[$row["tag"]] = array(
                    "data1" => $row["data1"],
                    "data2" => $row["data2"],
                    "data3" => $row["data3"],
                    "data4" => $row["data4"],
                    "data5" => $row["data5"],
                );
            }
        }

        $x = 1;
        while(isset($homepage[$addTagCategory . $x])){
            $x++;
        }




        $data1 = stringPostReturn("data1");
        $data2 = stringPostReturn("data2");
        $data3 = stringPostReturn("data3");
        $data4 = stringPostReturn("data4");
        $data5 = stringPostReturn("data5");


        if($_FILES["pdffileToUpload"]["size"]>0){
            $target_dir = __DIR__ . '/../../assets/pdf_raw_files/';
            $target_file = basename($_FILES["pdffileToUpload"]["name"]);
            $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  
            $filenameforserver = preg_replace("/[^a-zA-Z0-9.]+/", "", $target_file);
            $filenameforserver = pathinfo($filenameforserver, PATHINFO_FILENAME) . base_convert(round(microtime(true)), 10, 30) . "." . $pdfFileType;
            $target_file_name = $target_dir . $filenameforserver;
  
  
  
            $check = filesize($_FILES["pdffileToUpload"]["tmp_name"]);
  
            if($check == false) $error_on_pdf = true;
            if (file_exists($target_dir . $filenameforserver)) $error_on_pdf = true;
            if ($_FILES["pdffileToUpload"]["size"] > 5000000000) $error_on_pdf = true;  // 10000 KB LIMIT
  
  
            if($pdfFileType != "pdf" && $pdfFileType != "PDF") {
                $error_on_pdf = true;
            }
  
            if (!$error_on_pdf) {
                if (move_uploaded_file($_FILES["pdffileToUpload"]["tmp_name"], $target_file_name)) {
                    // echo "The file ". $filenameforserver. " has been uploaded.<br>";
                    $data1 =  $filenameforserver;
                }else $error_on_pdf = true;
            }
        }



        // echo "$data1 Hello";



        if($_FILES["fileToUpload"]["size"]>0){


            // Check the image and upload the image
            $target_dir = __DIR__ . '/../../assets/pdf_cover/';
            // echo $target_dir . "<br>";
            $target_file = basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


            $filenameforserver = preg_replace("/[^a-zA-Z0-9.]+/", "", $target_file);
            $filenameforserver = pathinfo($filenameforserver, PATHINFO_FILENAME) . base_convert(round(microtime(true)), 10, 30) . "." . $imageFileType;
            $target_file_name = $target_dir . $filenameforserver;


            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if($check == false) $error_on_image = true;
            if (file_exists($target_dir . $filenameforserver)) $error_on_image = true;
            if ($_FILES["fileToUpload"]["size"] > 5000000000) $error_on_image = true;  // 5000 KB LIMIT

           
            if (!$error_on_image) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_name)) {
                    // echo "The file ". $filenameforserver. " has been uploaded.<br>";
                    $data2 =  $filenameforserver;
                    $tagName = $addTagCategory . $x;

                    // echo "$data1<br>$tagName";

                    $stmt = $conn->prepare('INSERT INTO homepage( data1, data2, data3, data4, data5, tag) VALUES(?, ?, ?, ?, ?, ?);');
                    $stmt->bind_param("ssssss", $data1, $data2, $data3, $data4, $data5, $tagName);
                    if($stmt->execute()){
                        $isSuccess = true;
                        // echo "Success Changed";
                    }

                }
            }

        }


        




    }





    // Go To Page
    if($isSuccess) header("Location: ../home");



 ?>


