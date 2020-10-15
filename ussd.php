<?php
include("functions.php");
header('Content-type: text/plain');

//if testing on the browser use $_GET 
//if testing on the simulator or going live use $_POST

$session_id = $_POST['sessionId'];
$service_code = $_POST['serviceCode'];
$phone = $_POST['phoneNumber'];
$text= $_POST['text'];

//set default level to zero
$level = 0;

$data = explode ("*", $text);

// Get menu level from data reply
$level = count($data);

if($level == 1 or $level == 0){
    
    display_menu(); // show the home/first menu
}

if ($level > 1)
{

    if ($data[1] == "1"){
        // If user selected 1 send them to the registration menu
        register($data);
    }

    else if ($data[1] == "2"){
        //If user selected 2, send them to the about menu
        about($data);
    }
    else if ($data[1] == "3"){
        //If user selected 3, send them to the about us menu
        servicesInfo($data);
    }
    else if ($data[1] == "4"){
        //If user selected 4, send them to the services menu
        contactInfo($data);
    }
    else{
        $text="Invalid Input";
		ussd_proceed($text);
    }
}

?>

