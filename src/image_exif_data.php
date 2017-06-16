<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/13
 * Time: 11:37
 */

$file = "../data/IMG_20170613_1134100.jpg";

ini_set('exif.encode_unicode', 'utf-8');
$r = exif_read_data($file, null, true);

var_export($r);

$a = array (
    'GPSVersion' => '' . "\0" . '' . "\0" . '',
    'GPSLatitudeRef' => 'N',
    'GPSLatitude' =>
        array (
            0 => '39/1',
            1 => '55/1',
            2 => '5365200/1000000',
        ),
    'GPSLongitudeRef' => 'E',
    'GPSLongitude' =>
        array (
            0 => '116/1',
            1 => '26/1',
            2 => '41549999/1000000',
        ),
    'GPSAltitudeRef' => '',
    'GPSAltitude' => '0/100',
    'GPSTimeStamp' =>
        array (
            0 => '3/1',
            1 => '34/1',
            2 => '10/1',
        ),
    'GPSProcessingMode' => 'NETWORK' . "\0" . '',
    'GPSDateStamp' => '2017:06:13',
);

echo strlen(json_encode($a));

