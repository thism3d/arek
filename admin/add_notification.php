<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {



    $stmt = $conn->prepare('INSERT INTO notifications(notification) VALUES(?);');
    $stmt->bind_param("s", $notificationSQL);
    $notificationSQL = stringPostReturn("notification_server");
    if($stmt->execute()){
        $isSuccess = true;
    }



}

header('Location: ' . $serverhost .'notifications');
exit();

?>
