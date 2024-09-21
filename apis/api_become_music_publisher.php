<?php
$row_affected = false;  

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require '../server_files/cookiesvariables.php';
    require '../server_files/connectserver.php';


    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType === "application/json") {
        $content = trim(file_get_contents("php://input"));
        $decoded = json_decode($content, true);
        if(! is_array($decoded)) {
        } else {
        }
    }



    $fullname = input_checking($decoded["fullname"]);
    $email = input_checking($decoded["email"]);
    $phone = input_checking($decoded["phone"]);
    $message = input_checking($decoded["message"]);


    $stmt = $conn->prepare('INSERT INTO new_music_artist (fullname, email, phone, message ) VALUES(?, ?, ?, ?);');
    $stmt->bind_param("ssss", $fullname, $email, $phone, $message );
    if($stmt->execute()){
      $row_affected = $stmt->affected_rows > 0;

      // Hack
      $admin_email = "jacompas@interfineart.com";
      $to = "admin@interfineart.site, " . $admin_email;
      $subject = "New Artist Request Received";

      $email_message = '<p><i>New music artist request from <b>' . $fullname . '</b> has been received successfully</i></p>.<br><br><p>Email: '. $email .'</p><p>Full Name: '. $fullname .'</p>';
      
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      $headers .= 'From: InterfineArt <no-reply@interfineart.site>' . "\r\n";

      $retval = mail($to,$subject,$email_message,$headers);  
    }
}






if($row_affected){
  echo '{ "status" : "SUCCESS" }';
}else{
  echo '{ "status" : "FAILED" }';
}