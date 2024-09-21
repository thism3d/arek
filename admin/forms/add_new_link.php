<?php

    require '../admin_server_files/header_server_validate.php';


    $error_on_image = $error_on_pdf = false;
    $isSuccess = false;

    $addTagCategory = "link";
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

        // echo $data1;

        $tagName = $addTagCategory . $x;
        $stmt = $conn->prepare('INSERT INTO homepage( data1, data2, data3, data4, data5, tag) VALUES(?, ?, ?, ?, ?, ?);');
        $stmt->bind_param("ssssss", $data1, $data2, $data3, $data4, $data5, $tagName);
        if($stmt->execute()){
            $isSuccess = true;
        }



        




    }





    // Go To Page
    if($isSuccess) header("Location: ../links");



 ?>


