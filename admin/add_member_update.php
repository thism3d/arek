<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {


    $stmt = $conn->prepare('UPDATE applications SET status = "Approved" WHERE id = ?;');
    $stmt->bind_param("i", $member_id);

    $member_is_activated = stringPostReturn("profile_is_activate");
    $member_id = intval(stringPostReturn("profile_id"));


    if($stmt->execute()){
        $isSuccess = true;
    }



}

header('Location: ' . $serverhost .'home');
exit();

?>
