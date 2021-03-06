<?php

require __DIR__ . '/config.php';
define("GET_API", filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING));

if (($api = GET_API)) {
    $check_api_key = $database->count("api_keys", ["key" => $api, "referrer" => APP_URL, "limit[>]" => 0]);
    if ((int) $check_api_key !== 1) {
        kill_everything("Invalid API Key", "Invalid referrer / Invalid API Key / Limit reached");
    }
} else {
    kill_everything("Missing API Key", "You need to include your API Key that match with your domain");
}

if (($search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING))) {
    $ytsettings = array(
        'key' => YOUTUBE_API_KEY,
        'referer' => 'http://www.pitube.ml/api.php',
        'type' => 'video',
        'regionCode' => 'RO',
        'videoDuration' => 'medium'
    );
    $youtube = new Madcoda\Youtube\Youtube($ytsettings);
    $list = $youtube->search($search, 5);
    echo json_encode($list);
}

if (($link = filter_input(INPUT_POST, 'download', FILTER_SANITIZE_STRING))) {
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match);
    if (isset($match[1])) {
        $youtube_id = $match[1];
    } else {
        kill_everything("error", "Invalid URL");
    }
    $dbquery = $database->select(APP_TABLE_NAME, ["externalid", "file_name", "timestamp", "accesed"], ["externalid" => $youtube_id]);

    if (count($dbquery) === 0) {
        $cmd = 'youtube-dl --extract-audio --audio-quality 3 --audio-format mp3 --no-playlist -o "/var/www/html/downloads/%(id)s.%(ext)s" ' . $youtube_id;
        set_time_limit(0);
        $title = url_title('https://m.youtube.com/watch?v=' . $youtube_id);
        // now let`s download it
        $handle = popen($cmd, "r");
        if (ob_get_level() == 0)
            ob_start();
        while (!feof($handle)) {
            $buffer = fgets($handle);
            // echo $buffer. "<br />";
            ob_flush();
            flush();
        }
        pclose($handle);
        ob_end_flush();

        $database->insert(APP_TABLE_NAME, [
            "externalid" => $youtube_id,
            "file_name" => $title
        ]);
        $new_title = $title;
        $timestamp = "Right now";
        $accesed = 0;
    } else {
        $new_title = $dbquery[0]["file_name"];
        $timestamp = $dbquery[0]["timestamp"];
        $accesed = $dbquery[0]["accesed"];
    }

    $data = $database->update("api_keys", ["limit[-]" => 1], ["key" => GET_API]);
    $sinfo = array('songinfo' => array('id' => $youtube_id, 'addedon' => $timestamp, 'titlu' => $new_title, 'size' => human_filesize($youtube_id), 'downloads' => $accesed));
    echo json_encode($sinfo);
    die();
}

function human_filesize($file, $decimals = 2) {
    $bytes = @filesize("downloads/" . $file . ".mp3");
    $sz = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

function url_title($page_url) {
    $read_page = file_get_contents($page_url);
    preg_match("/<title.*?>[\n\r\s]*(.*)[\n\r\s]*<\/title>/", $read_page, $page_title);
    if (isset($page_title[1])) {
        if ($page_title[1] == '') {
            return 'untitled';
        }
        $page_title = str_replace(' - YouTube', '', $page_title[1]);
        $page_title = str_replace('&amp;', '', $page_title);
        return trim($page_title);
    } else {
        return $page_url;
    }
}

function kill_everything($title, $message) {
    header('HTTP/1.1 500 Internal Server Error');
    die(json_encode(array("error" => $title, "message" => $message)));
}
