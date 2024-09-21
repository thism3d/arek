<?php

    require 'admin_server_files/header_server_validate.php';


    $isSuccess = false;

    $payee_vpa = $payee_display_name = $merchant_category_code = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {



        $payee_vpa = stringPostReturn("payee_vpa");
        $payee_display_name = stringPostReturn("payee_display_name");
        $merchant_category_code = stringPostReturn("merchant_category_code");



        $directoryOfFile = '../server_files/upi_paramaters.php';


$stringToAssign =
'<?php
$upi_pa = "'. $payee_vpa .'";
$upi_pn = "'. rawurlencode($payee_display_name) .'";
$upi_mc = "'. $merchant_category_code .'";
?>
';



        $myfile = fopen($directoryOfFile, "w") or die("Unable to open file!");
        fwrite($myfile, $stringToAssign);
        fclose($myfile);





    }

    if($isSuccess){
        echo "Executed";
    }




    // Go To Page
    header("Location: upi_pay_edit");



 ?>
