<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {



    $stmt = $conn->prepare('UPDATE accounts SET withdrawal_status = ? WHERE id = ?;');
    $stmt->bind_param("si", $withdrawal_status, $transaction_id);

    $transaction_id = intval(stringPostReturn("tr_id"));
    $withdrawal_status = "Accepted";


    if($stmt->execute()){
        $isSuccess = true;
    }



}

header('Location: ' . $serverhost .'withdrawals');
exit();

?>
