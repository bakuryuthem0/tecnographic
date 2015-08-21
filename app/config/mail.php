<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Mail Driver
	|--------------------------------------------------------------------------
	|
	| Laravel supports both SMTP and PHP's "mail" function as drivers for the
	| sending of e-mail. You may specify which one you're using throughout
	| your application here. By default, Laravel is setup for SMTP mail.
	|
	| Supported: "smtp", "mail", "sendmail"
	|
	*/

	"driver" => "smtp",
	"host" => "mailtrap.io",
	"port" => 2525,
	"from" => array(
	  "address" => "from@exampe.com",
	  "name" => "Example"
	),
	"username" => "25726b19166714507",
	"password" => "6f1aca10c5c34b",
	"sendmail" => "/usr/sbin/sendmail -bs",

);
