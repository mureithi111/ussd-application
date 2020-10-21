<?php
include("functions.php");

//if testing on the browser use $_GET 
//if testing on the simulator or going live use $_POST

//print_r($_GET);

$session_id = $_GET['sessionId'];
$service_code = $_GET['serviceCode'];
$phone = $_GET['phoneNumber'];
$text = strval($_GET['text']);
//echo ($_POST);

//set default level to zero
$level = 0;

$data = explode("*", $text);

// Get menu level from data reply
$level = count($data);

if ($text == "") {
    display_menu(); // show the home/first menu
} else {

    switch ($level) {
        case 1:
            if ($data[0] == 1) {
                // If user selected 1 send them to the registration menu
                echo register($data);
                break;
            } else if ($data[0] == "2") {
                //If user selected 2, send them to the about menu
                echo about($data);
                break;
            } else if ($data[0] == "3") {
                //If user selected 3, send our services menu
                echo servicesInfo($data);
                break;
            } else if ($data[0] == "4") {
                //If user selected 4, send them the contact Info menu
                echo contactInfo($data);
                break;
            } else {
                //checks if the user input is correct
                $text = "Invalid Input";
                echo ussd_proceed($text);
                break;
            };
        case 2:
            if($data[0] == 1) {
                echo register($data);
            }
            if($data[0] == 3) {
                echo screenRepair($data);
            }
            break;
        case 3:
            if($data[0] == 1) {
                echo register($data);
            }
            break;
        case 4:
            if($data[0] == 1) {
                echo register($data);
            }
            break;
        case 5:
            if($data[0] == 1) {
                echo register($data);
            }
            break;
    }


}
//
//?>
<!---->
