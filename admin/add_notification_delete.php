<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {



    $notification_id = intval(stringPostReturn("notification_id"));



    $sql = "DELETE FROM notifications WHERE serial = " . $notification_id;
    if($conn->query($sql)){
        $row_affected = true;
    }


}

header('Location: ' . $serverhost .'notifications');
exit();

?>
