<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {



    $purchase_package_id = intval(stringPostReturn("package_purchase_id"));

    $sql = "DELETE FROM purchased_packages WHERE id = " . $purchase_package_id;
    if($conn->query($sql)){
        $row_affected = true;
    }




}

header('Location: ' . $serverhost .'package_summary');
exit();

?>
