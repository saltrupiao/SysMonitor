<?php
#$file = fopen("../dbpass.txt", "r") or die("Unable to open file!");
#$variable = fread($file,filesize("../dbpass.txt"));
#echo "This is a test\n";
#echo $variable;
#echo "Variable read";
#fclose($file);
session_start();
        $servername = "localhost";
        $username = "root";          //For Bitnami
	$myfile = fopen("/srv/http/dbpass.txt","r");
	$password = strval(trim(fgets($myfile)));
//	echo $password;
	//$dbname = "csi-2520";    //For Bitnami
	$dbname = "yourdb";        // For SECS server
	$conn = new mysqli($servername, $username, $password, $dbname);
		
	if ($conn->connect_error) {
	          die("Connection failed: " . $conn->error);
	} 
//	echo "Connection Successful <br>";
	fclose($myfile);
		
?>
