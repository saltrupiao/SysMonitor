<?php
/**
 * Created by PhpStorm.
 * User: saltrupiano
 * Date: 4/9/20
 * Time: 2:01 PM
 */

$servername = "35.196.30.1";
$username = "user";
$password = "GuoJ1RaadXHf";
$dbname = "sysmonitor";


if(isset($_POST['ip1'])){
    $ipPC1 = $_POST['ip1'];
}

if(isset($_POST['ip2'])){
    $ipPC2 = $_POST['ip2'];
}

if(isset($_POST['ip3'])){
    $ipPC4 = $_POST['ip3'];
}

if(isset($_POST['ip4'])){
    $ipPC5 = $_POST['ip4'];
}

if(isset($_POST['ip5'])){
    $ipPC5 = $_POST['ip5'];
}

if(isset($_POST['ipn'])){
    $ipPCN = $_POST['ipn'];

    $command = escapeshellcmd('python /usr/local/bin/mainRefactor.py --newHost' . $ipPCN);
    $output = shell_exec($command);
    echo $output;

}

if(isset($_POST['delBtn'])) {
    $cliHostname = $_POST['delBtn'];
    $cliID = $_POST['cliID'];

    //Sourced from: https://www.w3schools.com/php/php_mysql_delete.asp
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM client WHERE cli_id=$cliID";
    $result = $conn->query($sql);
    if($conn->query($sql) === TRUE) {
        echo "deleted computer";
    } else {
        echo "error deleting computer" . $conn->error;
    }

    $conn->close();
}

/*
$command = escapeshellcmd('/Users/saltrupiano/PhpstormProjects/SysMonitor/test1.py');
$output = shell_exec($command);
echo $output;

*/