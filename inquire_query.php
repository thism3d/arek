<?php
$row_affected = false;       // Default Initialisation
$error_on_image = false;


if($_SERVER["REQUEST_METHOD"] == "POST"){


   require_once 'server_files/connectserver.php';



    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $address = $_POST["address"];
    $interestedIn = $_POST["interestedIn"];

    $stmt = $conn->prepare('INSERT INTO inquire_customers(name, email, phoneNumber, address, interestedIn) VALUES ( ?, ?, ?, ?, ? )');
    $stmt->bind_param("sssss", $name, $email, $phoneNumber, $address, $interestedIn  );
    if($stmt->execute()){
        $row_affected = true;

        
        $mail_address = $email;
        $mail_subject = "Customer Inquiry Submitted from " . $name;
        
        $mail_html_body = 
        '<h3>Customer Inquiry Submitted</h3>
        <p><i>Please check it out and reach out to the customer if necessary.</i></p>
        <br>
        <p><strong>Customer Inquiry Information</strong></p><hr>
        <p><b>Name:</b> '. $name .'</p>
        <p><b>Address:</b> ' . $address . '</p>
        <p><b>Phone Number:</b> ' . $phoneNumber . '</p>
        <br>
        <p><b>Interested In:</b> ' . $interestedIn;
        
        $mail_paintext_body = "Custom Inquiry submitted by " . $name . ". Phone Number: " . $phoneNumber;
        require_once 'mail.php';
    }



}else{
    header("Location: index.php");
}


if($row_affected){
    require_once 'server_files/header.php';

    echo '
        <div class="download_complete_container">
            <img src="assets/inquiry.png">
        </div>
        <div class="maintance_brief_container">
            <h1 class="download_heading">Your inquiry has been submitted</h1>

            <p class="maintenance_text1">Our team would look into it. Please wait shortly while to try to check your inquiry request.</p>

            <p class="maintenance_text2">Thank You</p>

            <a href="contact">Contact us to get updates !!</a>
        </div>
    ';

    require_once 'server_files/footer.php';
}else{
    header("Location: index.php");
}





?>