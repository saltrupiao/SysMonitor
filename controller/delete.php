<?php

/**
 * Created by PhpStorm.
 * User: saltrupiano
 * Date: 3/11/20
 * Time: 3:34 PM
 */
//Sourced from: https://www.geeksforgeeks.org/how-to-delete-a-file-using-php/


session_start();

$fileToDelete = $_GET['getFileName'];

$targetDir = '/usr/local/share/sysInfo/';

$fullPath = $targetDir . $fileToDelete;

if (is_dir($fullPath)) {
    rmdir($fullPath);
    header ("Location: ../view/logmgmt.php");
} else {
    unlink($fullPath);
    header ("Location: ../view/logmgmt.php");
}

header ("Location: ../view/logmgmt.php");

/*
if (!unlink($fullPath)) {
    echo ("$fullPath cannot be deleted due to an error");
}
else {
    echo ("$fullPath has been deleted");
    header ("Location: index.php");
}
*/