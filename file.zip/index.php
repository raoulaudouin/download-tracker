<?

$logFile = 'log.txt';

if (file_exists($logFile)) {
	// Checks the first line of the log file
	$logFirstLine = fgets(fopen($logFile, 'r'));
} else {
	die('The log file does not exist.');
}

$downloadFile = basename(__DIR__);

if ($logFirstLine !== $downloadFile.PHP_EOL) {
	// if the first line is not $downloadFile, clear the log
	file_put_contents($logFile, $downloadFile.PHP_EOL);
}

// stores download time and client IP in the log
$isoRequestTime = date("r", $_SERVER['REQUEST_TIME']);
$clientIp = $_SERVER['REMOTE_ADDR'];
$downloadInfo = $isoRequestTime."\t".$clientIp.PHP_EOL;

file_put_contents($logFile, $downloadInfo, FILE_APPEND);

if(file_exists($downloadFile)) {
	header("Cache-Control: no-cache");
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.$downloadFile.'"');
	header('Content-Length: '.filesize($downloadFile));
	readfile($downloadFile);
	exit;
} else {
	die('This file does not exist.');
}

?>