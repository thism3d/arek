<?php

require 'admin_server_files/header_server_validate.php';

$row_affected = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {

        $ads_id = intval(stringPostReturn("ads_id"));

        $sql = 'SELECT viewed_by FROM ads_view WHERE ads_id = '. $ads_id .';';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION["ads_delete_problem"] = "Yes";
        }else{

            $sql = "DELETE FROM all_ads WHERE id = " . $ads_id;
            if($conn->query($sql)){
                $row_affected = true;
            }

        }


}

header('Location: home');
exit();

?>
