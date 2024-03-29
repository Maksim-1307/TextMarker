Открытие файла

<?php

session_start();

require_once 'settings.php';

function deleteDir(string $dir): void
{
    $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator(
        $it,
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($files as $file) {
        if ($file->isDir()) {
            rmdir($file->getPathname());
        } else {
            unlink($file->getPathname());
        }
    }
    rmdir($dir);
}

function unzip($from, $to){
    $zip = new ZipArchive;

    if (!($zip->open($path))){
        return false;
    }

    $aFileName = explode('/', $to);
    $aFileName = $aFileName[end($aFileName)];

    // $fileFullName = $_SESSION["file"]["currentfile"];
    // $aFileName = explode('.', $fileFullName)[0];

    //$_SESSION["file"]["unzip_folder_name"] = $aFileName;

    //$extractDir = $_SESSION["file"]["cash_directory_relative_path"] . $aFileName;

    if (is_dir($to)) {
        deleteDir($to);
    }

    if (!mkdir($to)) {
        die("Не удалось открыть файл");
    }

    if (!($zip->extractTo($to))) {
        die("Не удалось открыть файл");
    } else {
        header('Location: process.php');
    }
}

$zip = new ZipArchive;
$zip->open($_SESSION["file"]["cash_directory_relative_path"] . $_SESSION["file"]["currentfile"]);

$fileFullName = $_SESSION["file"]["currentfile"];
$aFileName = explode('.', $fileFullName)[0];

$_SESSION["file"]["unzip_folder_name"] = $aFileName;

$extractDir = $_SESSION["file"]["cash_directory_relative_path"] . $aFileName;

if (is_dir($extractDir)) {
    deleteDir($extractDir);
}

if (!mkdir($extractDir)) {
    die("Не удалось открыть файл");
}

if (!($zip->extractTo($extractDir))) {
    die("Не удалось открыть файл");
} else {
    //die();
    header('Location: process.php');
}


//header('Location: process.php');


// $sDirectoryName = $_SESSION["file"]["cash_directory_relative_path"];

?>