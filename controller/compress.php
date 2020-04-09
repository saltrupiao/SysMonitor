<?php
/**
 * Created by PhpStorm.
 * User: saltrupiano
 * Date: 4/8/20
 * Time: 5:26 PM
 */

//$zip = new ZipArchive;

$curDate = date("Y-m-d");


$zipFileName = "archive-$curDate.zip";

$zipDir = "/Users/saltrupiano/PhpstormProjects/SysMonitor/compressedFiles/$zipFileName";



//Sourced From: https://stackoverflow.com/questions/4914750/how-to-zip-a-whole-folder-using-php

// Get real path for our folder
$rootPath = realpath('/Users/saltrupiano/PhpstormProjects/SysMonitor/testdir12/');

// Initialize archive object
$zip = new ZipArchive();
$zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Initialize empty "delete list"
$filesToDelete = array();

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);

        // Add current file to "delete list"
        // delete it later cause ZipArchive create archive only after calling close function and ZipArchive lock files until archive created)
        if ($file->getFilename() != 'important.txt')
        {
            $filesToDelete[] = $filePath;
        }
    }
}

// Zip archive will be created only after closing object
$zip->close();

// Delete all files from "delete list"
foreach ($filesToDelete as $file)
{
    unlink($file);
}

//Sourced from: https://stackoverflow.com/questions/17708562/zip-all-files-in-directory-and-download-generated-zip

header('Content-Type: application/zip');
header("Content-Disposition: attachment; filename=$zipFileName");
header('Content-Length: ' . filesize($zipFileName));
//header("Location: $zipFileName");

flush();
readfile($zipFileName);
unlink($zipFileName);