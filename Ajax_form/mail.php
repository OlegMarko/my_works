<?php

	$recepient = "123@mmmail.com.ua";
	$sitename = "SiteName.com.ua";

	$name = trim($_POST['name']);
	$phone = trim($_POST['phone']);
	$message = "Name: $name \n Phone: $phone";
	
	$mTitle = "Нова заявка із сайту $sitename";
	mail($recepient, $mTitle, $message, "Content-type: text/plain; charset='utf-8' \n From");
	