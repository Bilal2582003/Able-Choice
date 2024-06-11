<?php
include "../../Model/connection.php";

$backupFolder = '../../Database/';
$backupFile = $backupFolder . $db . '_backup_' . date('Y-m-d_H-i-s') . '.sql';

// Ensure the backup folder exists and is writable
if (!is_dir($backupFolder)) {
    mkdir($backupFolder, 0777, true);
}
if (!is_writable($backupFolder)) {
    die("The backup folder is not writable.");
}

// Command to create a database backup
$command = "mysqldump --host=$host --user=$user_name --password=$password $db > $backupFile 2>&1";

// Execute the command and capture the output
exec($command, $output, $resultCode);

// Check if the backup file was created and output the result
if (file_exists($backupFile) && filesize($backupFile) > 0) {
    echo "Database backup successfully saved to: $backupFile";
} else {
    echo "Failed to create database backup.<br>";
    echo "Command: $command<br>";
    echo "Result Code: $resultCode<br>";
    echo "Output: <pre>" . print_r($output, true) . "</pre>";
}
?>
