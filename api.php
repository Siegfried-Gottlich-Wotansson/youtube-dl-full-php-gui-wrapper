<?php
require __DIR__ . '/config.php';
use YoutubeDl\YoutubeDl;

if (!($link = filter_input(INPUT_POST, 'download', FILTER_SANITIZE_STRING))) {
	die();
	} else {
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
	$youtube_id = $match[1];

	$dbquery = $database->select(APP_TABLE_NAME, ["externalid","locatie"], ["externalid" => $youtube_id]);

	if(count($dbquery) === 0) {
		$dl = new YoutubeDl([
			'extract-audio' => true,
			'audio-format' => 'mp3',
			'audio-quality' => 0,
			'output' => '%(title)s.%(ext)s',
		]);
		$dl->setDownloadPath(APP_LOCATION.'/downloads');
		$video = $dl->download($link);
		// Enable debugging
		/*$dl->debug(function ($type, $buffer) {
			if (\Symfony\Component\Process\Process::ERR === $type) {
				echo 'ERR > ' . $buffer;
			} else {
				echo 'OUT > ' . $buffer;
			}
		});*/
		$database->insert(APP_TABLE_NAME, [
			"externalid" => $youtube_id,
			"locatie" => $video["_filename"]
		]);
		$locatiemp3 = $video["_filename"];
	} else {
		$locatiemp3 = $dbquery[0]["locatie"];
	}

	$sinfo = array('songinfo' => array('id' => $youtube_id, 'fisier' => $locatiemp3, 'size' => human_filesize($locatiemp3)));
	echo json_encode($sinfo);
	die();
}

function human_filesize($file, $decimals = 2) {
	$bytes = @filesize("downloads/".$file);
	$sz = 'BKMGTP';
	$factor = floor((strlen($bytes) - 1) / 3);
	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}
?>