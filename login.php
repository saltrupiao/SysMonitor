<!doctype html>
<html>

<title>Hello</title>
<body>
<?php
	session_start();

	include "sqldb.php";
	$enterUser = $_POST['username'];
	$enterPass = $_POST['password'];
	$secPass = md5(($enterPass));
	//echo $mdPass;
	$sql = "SELECT * FROM accounts WHERE username='$enterUser'";	
	//$sql = "SELCT * FROM 'account' WHERE 1";
	$result = $conn->query($sql);
	echo $result->num_rows;
	echo "Running SQL statement - <br>" . $sql . "<br>";
	echo "test <br>";
    	
	$row = $result->fetch_assoc();
	if ( $secPass === $row["password"]){
	    #echo "pass" . $row["username"] . "<br>";
	    $_SESSION['login'] = $row["username"];
	    header("Location: journal.php");
	    //echo "Session login value = " . $_SESSION . "<br>";
	    //echo "Password match";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	    #header("Location: login.html");
	    $_SESSION['login']='';
	    $ref = getenv("HTTP_REFERER");
	    //$goto = "Location: " . $ref;
	}
	$conn->close();
?>
</body>
</html>
