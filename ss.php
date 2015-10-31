<?php
$BASE = '/home/ken/storage';
$appName = 'ss';

date_default_timezone_set('Asia/Tokyo');

function getDir($base, $appName, $taskName){
    return $base . "/" . $appName . "/" . $taskName;
}

function getFileName($fileName, $fileExt){
    $datatime_str = date("YmdHis");
    return $fileName . "-" . $datatime_str . "." .$fileExt;
}

$taskName = $_POST['task_name'];
$fileName = $_POST['file_name'];
$fileExt = $_POST['file_ext'];

$targetDir = getDir($BASE, $appName, $taskName);
if (!is_dir($targetDir)){
    mkdir($targetDir, 0777, true);
}
$target = $targetDir . "/" . getFileName($fileName, $fileExt);

move_uploaded_file($_FILES['file']['tmp_name'], $target);
error_log($target . " was uploaded");
?>
