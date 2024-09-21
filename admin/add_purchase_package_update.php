<?php

require 'admin_server_files/header_server_validate.php';

$isSuccess = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {



    $stmt = $conn->prepare('UPDATE purchased_packages SET is_verified = ? WHERE id = ?;');
    $stmt->bind_param("si", $is_verified, $purchase_package_id);

    $is_verified = stringPostReturn("package_purchase_status");
    $purchase_package_id = intval(stringPostReturn("package_purchase_id"));

    if($stmt->execute()){
        $isSuccess = true;
    }


    if($is_verified == "Yes" && $isSuccess){
        $user_id = stringPostReturn("user_id");

        $reffered_by = 0;

        $sql = 'SELECT fullname, username, phoneNumber, referred_by FROM users WHERE referred_by IS NOT NULL AND id = '. $user_id .';';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $reffered_by = intval($row["referred_by"]);
            }
        }


        $is_reffered_user_exist = false;
        if($reffered_by > 0){
            $sql = 'SELECT fullname, username, phoneNumber FROM users WHERE id = '. $reffered_by .';';
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $is_reffered_user_exist = true;
            }
        }


        if($is_reffered_user_exist){
            $package_price = doubleval(stringPostReturn("package_price"));
            $stmt = $conn->prepare('INSERT INTO accounts (user_id, credit_amount, credit_section) VALUES( ?, ?, ?);');
            $stmt->bind_param("ids", $account_user, $credit_amount, $credit_section);

            $account_user = $reffered_by;
            $credit_amount = $package_price * 0.10;
            // echo $package_price;
            $credit_section = "Referral";
            $stmt->execute();
        }

    }



}

header('Location: ' . $serverhost .'package_summary');
exit();

?>
