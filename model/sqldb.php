<?php
#$file = fopen("/usr/local/bin/passwd.txt", "r") or die("Unable to open file!");
#$variable = fread($file,filesize("../passwd.txt"));
#echo "This is a test\n";
#echo $variable;
#echo "Variable read";
#fclose($file);
session_start();
        $servername = "localhost";
        $username = "user";          //For Bitnami
	$myfile = fopen("/usr/local/bin/passwd.txt","r");
	$password = strval(trim(fgets($myfile)));
//	echo $password;
	//$dbname = "csi-2520";    //For Bitnami
	$dbname = "sysmonitor";        // For SECS server
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	          die("Connection failed: " . $conn->error);
	}
//	echo "Connection Successful <br>";
	fclose($myfile);
?>
