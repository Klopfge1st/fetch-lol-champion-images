<?php

$baseUrl = 'http://ddragon.leagueoflegends.com/cdn/';
$version = '10.19.1';

$profileUrl = $baseUrl . $version . '/img/champion/';
$loadingUrl = $baseUrl . 'cdn/img/champion/loading/';
$championsApiData = $baseUrl . $version . '/data/en_US/champion.json';

$file = json_decode(file_get_contents($championsApiData), true);
$champArray = [];

foreach ($file as $key => $val) {
    if (is_array($val)) {
        foreach ($val as $v => $e) {
            array_push($champArray, $v);
        }
    }
}

foreach ($champArray as $i => $c) {
    $imageName = './images/profile/' . $c . '.png';

    if (!file_exists($imageName)) {
        $url = file_get_contents($profileUrl . $c . '.png');
        file_put_contents('./images/profile/' . $c . '.png', $url);
    }
}

print_r('all profile images added' . PHP_EOL);


foreach ($champArray as $i => $c) {
    $imageName = './images/loader/' . $c . '.jpg';
    if (!file_exists($imageName)) {
        $url = file_get_contents($loadingUrl . $c . '_0.jpg');
        file_put_contents('./images/loader/' . $c . '.jpg', $url);
    }
}

print_r('all loader images added' . PHP_EOL);
