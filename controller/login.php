<!doctype html>
<html>

<title>Hello</title>
<body>
<?php
	session_start();

	include "../model/sqldb.php";
	$enterUser = $_POST['username'];
	$enterPass = $_POST['password'];
	#$secPass = md5(($enterPass));
	//echo $mdPass;
	$sql = "SELECT * FROM accounts WHERE username='$enterUser'";
	//$sql = "SELCT * FROM 'account' WHERE 1";
	$result = $conn->query($sql);
	//echo $result->num_rows;
	//echo "Running SQL statement - <br>" . $sql . "<br>";
	//echo "test <br>";

	$row = $result->fetch_assoc();
	$hash = $row["password"];
	$auth = password_verify($enterPass, $hash);

	if ( $auth == TRUE ){
	    #echo "pass" . $row["username"] . "<br>";
	    $_SESSION['login'] = $row["username"];
	    header("Location: ../view/dashboard.php");
	    //echo "Session login value = " . $_SESSION . "<br>";
	    //echo "Password match";
	} else {
	    echo "invalid username or password. Please try again";
	    $_SESSION['login']='';
	    #header("Location: ../index.php");
	    //$goto = "Location: " . $ref;
	}
	$conn->close();
?>
</body>
</html>
