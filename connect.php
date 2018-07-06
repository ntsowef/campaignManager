<?php

//     	$host = "197.242.147.138";
//        $user = "frans";
//        $pswd = "Tsowe*)0#&&";
//        $database = "aggregation_data";
//     	@mysql_pconnect($host, $user, $pswd) or die("Couldn't connect to server, the is a problem with your internet ".mysql_error());
//        @mysql_select_db($database) or die("Couldn't select $database database! ".mysql_error());
//	
        
        
        
        $host = "localhost";
        $user = "root";
        $pswd = "";
        $database = "sms_data";
     	@mysql_pconnect($host, $user, $pswd) or die("Couldn't connect to server, the is a problem with your internet ".mysql_error());
        @mysql_select_db($database) or die("Couldn't select $database database! ".mysql_error());
?>

