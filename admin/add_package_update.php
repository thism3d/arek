<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {



    $stmt = $conn->prepare('UPDATE all_packages SET is_activated = ? WHERE id = ?;');
    $stmt->bind_param("si", $package_is_activated, $package_id);

    $package_is_activated = stringPostReturn("package_status");
    $package_id = intval(stringPostReturn("package_id"));


    if($stmt->execute()){
        $isSuccess = true;
    }



}

header('Location: ' . $serverhost .'packages');
exit();

?>
