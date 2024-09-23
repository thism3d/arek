<?php
$row_affected = false;       // Default Initialisation
$error_on_image = false;


if($_SERVER["REQUEST_METHOD"] == "POST"){


   require_once 'server_files/connectserver.php';



    $tenantName = $_POST["tenantName"];
    $propertyAddress = $_POST["propertyAddress"];
    $tenantEmail = $_POST["tenantEmail"];
    $phoneNumber = $_POST["phoneNumber"];
    $descriptionOfIssue = $_POST["descriptionOfIssue"];

    
    if($_FILES["fileToUpload"]["size"]>0){


        // Check the image and upload the image
        $target_dir = __DIR__ . '/assets/maintenance_request/';
        // echo $target_dir . "<br>";
        $target_file = basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


        $filenameforserver = preg_replace("/[^a-zA-Z0-9.]+/", "", $target_file);
        $filenameforserver = pathinfo($filenameforserver, PATHINFO_FILENAME) . base_convert(round(microtime(true)), 10, 30) . "." . $imageFileType;
        $target_file_name = $target_dir . $filenameforserver;


        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        if($check == false) $error_on_image = true;
        if (file_exists($target_dir . $filenameforserver)) $error_on_image = true;
        if ($_FILES["fileToUpload"]["size"] > 500000000) $error_on_image = true;  // 500000 KB LIMIT

       
        if (!$error_on_image) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_name)) {
            
                $img = $filenameforserver;

                $stmt = $conn->prepare('INSERT INTO maintainance_request (tenantName, propertyAddress, tenantEmail, phoneNumber, descriptionOfIssue, img) VALUES( ?, ?, ?, ?, ?, ? );');
                $stmt->bind_param("ssssss", $tenantName, $propertyAddress, $tenantEmail, $phoneNumber, $descriptionOfIssue,  $img  );
                if($stmt->execute()){
                    $row_affected = true;

                    $to = "muzahid221@gmail.com, " . $tenantEmail;
                    $subject = "Maintenance Request Submitted from " . $tenantName;

                    $message = '<h2>Maintenance Request</h2>
                    <br>
                    <p>Tenant Name: '. $tenantName .'</p>
                    <p>Property Address: ' . $propertyAddress . '</p>
                    <p>Phone Number: ' . $phoneNumber . '</p>
                    <br>
                    <p>Description of the issue: ' . $descriptionOfIssue;
                    

                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    $headers .= 'From: Arek Property Management <admin@arekpm.com>' . "\r\n";

                    $retval = mail($to,$subject,$message,$headers);  
                    
                    
                    
                    $mail_address = $tenantEmail;
                    $mail_subject = "Maintenance Request Submitted by " . $tenantName;
                    
                    $mail_html_body = 
                    '<h3>Maintenance Requested</h3>
                    <p><i>Solve it as soon as possible</i></p>
                    <br>
                    <p><strong>Tenant Information</strong></p><hr>
                    <p><b>Tenant Name:</b> '. $tenantName .'</p>
                    <p><b>Property Address:</b> ' . $propertyAddress . '</p>
                    <p><b>Phone Number:</b> ' . $phoneNumber . '</p>
                    <br>
                    <p><b>Description of the issue:</b> ' . $descriptionOfIssue;
                    
                    $mail_paintext_body = "Maintenance Request has been submitted by " . $tenantName . ". Phone Number: " . $phoneNumber;
                    require_once 'mail.php';
                }

            }
        }

    }




}else{
    header("Location: index.php");
}


if($row_affected){
    require_once 'server_files/header.php';

    echo '
        <div class="download_complete_container">
            <img src="assets/undraw_mail_sent_re_0ofv.svg">
        </div>
        <div class="maintance_brief_container">
            <h1 class="download_heading">Your maintenance requeest has been submitted</h1>

            <p class="maintenance_text1">Our team would look into it. Please wait shortly while to try to process your request.</p>

            <p class="maintenance_text2">Thank You</p>

            <a href="contact">Contact us to get updates !!</a>
        </div>
    ';

    require_once 'server_files/footer.php';
}else{
    header("Location: index.php");
}





?>