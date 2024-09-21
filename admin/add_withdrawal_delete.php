<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {




    $transaction_id = intval(stringPostReturn("tr_id"));
    $sql = "DELETE FROM accounts WHERE id = " . $transaction_id;
    if($conn->query($sql)){
        $isSuccess = true;
    }


}

header('Location: ' . $serverhost .'withdrawals');
exit();

?>
