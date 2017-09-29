<?php
require __DIR__ . '/config.php';

if (!($link = filter_input(INPUT_POST, 'download', FILTER_SANITIZE_STRING))) {
	die();
	} else {
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
	$youtube_id = $match[1];

	$dbquery = $database->select(APP_TABLE_NAME, ["externalid","file_name"], ["externalid" => $youtube_id]);

	if(count($dbquery) === 0) {
		$cmd = 'youtube-dl --extract-audio --audio-format mp3 --audio-quality 0 --no-playlist -o "/var/www/html/downloads/%(id)s.%(ext)s" '.$youtube_id;
		set_time_limit(0);
		$title = url_title('https://m.youtube.com/watch?v='.$youtube_id);
			// now let`s download it
			$handle = popen($cmd, "r");
			if (ob_get_level() == 0)
			ob_start();
			while(!feof($handle)) {
				$buffer = fgets($handle);
				// disabled for a moment, under work
				// echo clean_output($buffer, $youtube_id). "<br />";
				// echo $buffer. "<br />";
				ob_flush();
				flush();
			}
			pclose($handle);
			ob_end_flush();
		
		$database->insert(APP_TABLE_NAME, [
			"externalid"	=> $youtube_id,
			"file_name"		=> $title
		]);
		$new_title = $title;
	} else {
		$new_title = $dbquery[0]["file_name"];
	}

	$sinfo = array('songinfo' => array('id' => $youtube_id, 'titlu' => $new_title, 'size' => human_filesize($youtube_id)));
	echo json_encode($sinfo);
	die();
}

function clean_output($string, $ytid) {
	$string = str_replace($ytid, '', $string);
	$string = str_replace('.mp3', '', $string);
	$string = str_replace('.mp4', '', $string);
	$string = str_replace('.webm', '', $string);
	$string = str_replace('[youtube] :', '', $string);
	$string = str_replace('[download]', '', $string);
	$string = str_replace('at Unknown speed ETA Unknown ETA', '', $string);
	$string = str_replace('[ffmpeg] Destination:', 'Extracting MP3..', $string);
	$string = str_replace('/var/www/html/downloads/', 'Done', $string);
	$string = str_replace('Deleting original file /var/www/html/downloads/ (pass -k to keep)', 'Done', $string);
	return $string;
}

function get_percentage($string) {
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

function url_title($page_url) {
     $read_page=file_get_contents($page_url);
     preg_match("/<title.*?>[\n\r\s]*(.*)[\n\r\s]*<\/title>/", $read_page, $page_title);
      if (isset($page_title[1]))
      {
            if ($page_title[1] == '')
            {
                  return 'untitled';
            }
            $page_title = str_replace(' - YouTube', '', $page_title[1]);
            return trim($page_title);
      }
      else
      {
            return $page_url;
      }
}

?>