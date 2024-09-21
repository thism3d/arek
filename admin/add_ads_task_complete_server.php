<?php

require 'admin_server_files/header_server_validate.php';

$row_affected = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {

        $confirm_all_payment = stringPostReturn("confirm_all_payment");
        $ads_base_price = 0;

        if($confirm_all_payment == "kmIUNsdOKASy1237HKJkdklqeNMAJjfiwoeNYC78aJAHJHSDllweirNJ"){




                $ads_view_total_counts = array();
                $sql = 'SELECT COUNT(ads_id) AS total_viewed_today, viewed_by FROM ads_view GROUP BY viewed_by;';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $ads_view_total_counts[$row["viewed_by"]] = intval($row["total_viewed_today"]);
                    }
                }


                $counter = 0;

        		$sql_toexecute = false;
                $multiQuerySQL = '';

                $sql = 'SELECT purchased_packages.id AS purchase_pack_id, users.fullname, users.phoneNumber,  purchased_packages.dateadded, user_id, package_id, package_name, amount, daily_ads, transaction_number, order_no, upi_reference_id, upi_transaction_no, upi_id, is_verified FROM purchased_packages LEFT JOIN users ON users.id = purchased_packages.user_id WHERE is_verified = "Yes" ORDER BY purchased_packages.dateadded ASC;';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $total_task_completed = 0;
                        if(isset($ads_view_total_counts[$row["user_id"]])){
                            $total_task_completed = $ads_view_total_counts[$row["user_id"]];

                            if($total_task_completed > intval($row["daily_ads"])){
                                $total_task_completed = intval($row["daily_ads"]);
                            }

                            $ads_view_total_counts[$row["user_id"]] = $ads_view_total_counts[$row["user_id"]] - $total_task_completed;
                        }



                        $ads_base_price = doubleval(($row["amount"] * 0.03) / $row["daily_ads"]);


                        if($total_task_completed > 0){
                            if(!$sql_toexecute) $sql_toexecute = true;
                            $total_money_he_gets = intval($ads_base_price * $total_task_completed);
                            $multiQuerySQL = $multiQuerySQL . 'INSERT INTO accounts(user_id, credit_amount, credit_section) VALUES( '. $row["user_id"] .', '. $total_money_he_gets .', "Work");';
                        }



                        // sysout("Fullname: " . $row["fullname"] . ", Package: " . $row["package_name"] . ", Tasks: " . $row["daily_ads"] . ", Completed : " . $total_task_completed);
                    }
                }


                if($sql_toexecute){
                    $multiQuerySQL = $multiQuerySQL . 'DELETE FROM ads_view;';
                    if ($conn->multi_query($multiQuerySQL) === TRUE) {
                    }
                }

        }



}

header('Location: pay_for_ads');
exit();

?>
