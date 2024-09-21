<?php

require 'admin_server_files/header_server_validate.php';
require '../server_files/maintainance_status.php';


$isSuccess = false;
$directoryOfFile = '../server_files/maintainance_status.php';

$stringToAssign = '';
if($maintainance_break) {
    $stringToAssign =
    '<?php
    $maintainance_break = false;
    ?>
    ';
}else{
    $stringToAssign =
    '<?php
    $maintainance_break = true;
    ?>
    ';
}



$myfile = fopen($directoryOfFile, "w") or die("Unable to open file!");
fwrite($myfile, $stringToAssign);
fclose($myfile);


// Go To Page
header("Location: packages");



 ?>
