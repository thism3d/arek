<?php

    $x = NULL;
    $x = "String";
    $x = 1232.33;

    // echo $x . "<br>";

    // $fullname = "Muzahid" . " Islam";
    // echo $fullname . "<br>";

    // echo "<h2>". $fullname ."<h2><br>"; // String Concatnate

    // for($i = 0; $i < 10; $i++){
    //     echo $i . "<br>";
    //     echo '
    //     <div>
    //         <p>'. $fullname .'</p>
    //         <img src="logo.png">
    //     </div>';
    // }

    $title = "Muzahid";
    if(isset($title)){
        echo $title;
    }else{
        $title = "Arek Property Management | Your Home Team";
        echo $title;
    }
    

    // $title = NULL;

    // if($title == NULL){
    //     echo "NULL";
    // }else{
    //     echo "NOT NULL";
    // }

    // echo "<br><br>";

    // if(isset($sajib)){
    //     echo "Varibale is present";
    // }else{
    //     echo "Varibale is not present";
    // }

   
?>