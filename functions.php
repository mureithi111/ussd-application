<?php

//This is the home menu function
function display_menu(){
    $text = "WELCOME TO IT GARAGE\nPlease Reply with\n1.Register\n2.Check about us\n3.Check our services\n4.Contact info";
    ussd_proceed($text);
}

// Function that handles Registration menu
function register($data){
    if (count($data)==2)
	{
		$text ="Enter your First Name";
		ussd_proceed($text);
	}
	if (count($data)==3)
	{
		$text ="Enter your Last Name";
		ussd_proceed($text);
	}
	if (count($data)==4)
	{
		$text ="Enter your Id Number";
		ussd_proceed($text);
	}
	if (count($data)==5)
	{
		$text ="Enter your  four digit password";
		ussd_proceed($text);
    }
    if(count($data)==6 ){
        $phone = $_GET['phoneNumber'];
		$firstName = $data[2];
		$lastName =  $data[3];
		$idNumber =$data[4];
        $password = $data[5];
        $text = "Hello ".$firstName ." ".$lastName." ".$phone." ". "welcome";
        ussd_stop($text);
    }
}

// Function that hanldles About menu
function about($data){
    $text = "Welcome to It garage we are here to serve";
    ussd_stop($text);
}
//function handles our services
function servicesInfo($data){
	$text = "Please select your service\n1.computer repair\n2.phone repair";
	ussd_stop($text);
}
//function handles customer service contacts
function contactInfo($data){
	$text = "For any query contacts us on\n254700100100";
	ussd_stop($text);
}

//services
//computer menu
function computerRepair($data){
	$text = "Please select the type of computer repair\n1.screen repair\n2.General checkup";
	ussd_stop($text);
}
//phone menu
function phoneRepair($data){
	$text = "Please select the type of computer repair\n1.screen replacement\n2.Earphone repair\n3.Microphone repair";
	ussd_stop($text);
}

function ussd_proceed($text){
    echo "CON ".$text;
}

function ussd_stop($text){
    echo "END ".$text;
    exit();
}

?>