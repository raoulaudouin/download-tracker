<?

$downloadFile = basename(__DIR__);

$logFile = 'log.txt';

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