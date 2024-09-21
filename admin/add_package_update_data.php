<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {



    $stmt = $conn->prepare('UPDATE all_packages SET name = ?, amount = ?, daily_ads = ? WHERE id = ?;');
    $stmt->bind_param("siii", $package_name, $package_amount, $package_daily_ads, $package_id);

    $package_id = intval(stringPostReturn("package_id"));
    $package_name = stringPostReturn("package_name");
    $package_amount = intval(stringPostReturn("package_price"));
    $package_daily_ads = intval(stringPostReturn("daily_ads"));



    if($stmt->execute()){
        $isSuccess = true;
    }



}

header('Location: ' . $serverhost .'packages');
exit();

?>
