<?php

require __DIR__ . '/config.php';
if (!($link = filter_input(INPUT_POST, 'download', FILTER_SANITIZE_STRING))) {
	die();
	} else {
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
	$youtube_id = $match[1];

	$dbquery = $database->select(APP_TABLE_NAME, ["externalid","file_name"], ["externalid" => $youtube_id]);

	if(count($dbquery) === 0) {
		$cmd = 'youtube-dl --newline --extract-audio --audio-format mp3 --audio-quality 0 --no-playlist -o "/var/www/html/downloads/%(id)s.%(ext)s" '.$youtube_id;
		set_time_limit(0);
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://gdata.youtube.com/feeds/api/videos/'.$youtube_id);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($ch);
		curl_close($ch);

		if ($response) {
			$xml   = new SimpleXMLElement($response);
			$title = (string) $xml->title;
			// now let`s download it
			$handle = popen($cmd, "r");
			if (ob_get_level() == 0)
			ob_start();
			while(!feof($handle)) {
				$buffer = fgets($handle);
				// disabled for a moment, under work
				// echo clean_output($buffer, $youtube_id). "<br />";
				ob_flush();
				flush();
			}
			pclose($handle);
			ob_end_flush();
		} else {
			// Error handling.
		}
		
		$database->insert(APP_TABLE_NAME, [
			"externalid"	=> $youtube_id,
			"file_name"		=> $title
		]);
		$locatiemp3 = $title;
	} else {
		$locatiemp3 = $dbquery[0]["file_name"];
	}

	$sinfo = array('songinfo' => array('id' => $youtube_id, 'titlu' => $locatiemp3, 'size' => human_filesize($youtube_id)));
	echo json_encode($sinfo);
	die();
}

function clean_output($string, $ytid = 'QQcQDbpDH_o') {
	$string = str_replace($ytid, '', $string);
	$string = str_replace('.mp3', '', $string);
	$string = str_replace('.mp4', '', $string);
	$string = str_replace('.webm', '', $string);
	$string = str_replace('[youtube] :', '', $string);
	$string = str_replace('[download]', '', $string);
	$string = str_replace('at Unknown speed ETA Unknown ETA', '', $string);
	$string = str_replace('[ffmpeg] Destination:', 'Extracting MP3..', $string);
	$string = str_replace('Deleting original file (pass -k to keep) ', 'Done', $string);
	return $string;
}

function get_just_download_percent($string) {
	$start = '[download]';
	$end   = ' of';
	$output = strstr( substr( $string, strpos( $string, $start) + strlen( $start)), $end, true);
	return $output."<br />";
}

function human_filesize($file, $decimals = 2) {
	$bytes = @filesize("downloads/".$file.".mp3");
	$sz = 'BKMGTP';
	$factor = floor((strlen($bytes) - 1) / 3);
	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}
?>