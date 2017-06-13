<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/13
 * Time: 11:37
 */

//$file = "../data/IMG_20170613_113410.jpg";
//
//ini_set('exif.encode_unicode', 'utf-8');
//$r = exif_read_data($file, null, true);
//
//var_export($r);

$arr = array (
    'FILE' =>
        array (
            'FileName' => 'IMG_20170613_113410.jpg',
            'FileDateTime' => 1497324961,
            'FileSize' => 2447602,
            'FileType' => 2,
            'MimeType' => 'image/jpeg',
            'SectionsFound' => 'ANY_TAG, IFD0, THUMBNAIL, EXIF, GPS, INTEROP',
        ),
    'COMPUTED' =>
        array (
            'html' => 'width="2336" height="4160"',
            'Height' => 4160,
            'Width' => 2336,
            'IsColor' => 1,
            'ByteOrderMotorola' => 1,
            'ApertureFNumber' => 'f/2.0',
            'UserComment' => 'Hisilicon K3',
            'UserCommentEncoding' => 'ASCII',
            'Thumbnail.FileType' => 2,
            'Thumbnail.MimeType' => 'image/jpeg',
            'Thumbnail.Height' => 512,
            'Thumbnail.Width' => 288,
        ),
    'IFD0' =>
        array (
            'ImageWidth' => 2336,
            'ImageLength' => 4160,
            'BitsPerSample' =>
                array (
                    0 => 8,
                    1 => 8,
                    2 => 8,
                ),
            'Make' => 'HUAWEI',
            'Model' => 'HUAWEI MT7-TL10',
            'Orientation' => 1,
            'XResolution' => '72/1',
            'YResolution' => '72/1',
            'ResolutionUnit' => 2,
            'Software' => 'MT7-TL10C00B571',
            'DateTime' => '2017:06:13 11:34:11',
            'YCbCrPositioning' => 1,
            'Exif_IFD_Pointer' => 276,
            'GPS_IFD_Pointer' => 976,
            'DeviceSettingDescription' => 'ipp' . "\0" . '',
        ),
    'THUMBNAIL' =>
        array (
            'ImageWidth' => 288,
            'ImageLength' => 512,
            'Compression' => 6,
            'Orientation' => 1,
            'XResolution' => '72/1',
            'YResolution' => '72/1',
            'ResolutionUnit' => 2,
            'JPEGInterchangeFormat' => 1332,
            'JPEGInterchangeFormatLength' => 17865,
        ),
    'EXIF' =>
        array (
            'DocumentName' => NULL,
            'ExposureTime' => '1/50',
            'FNumber' => '200/100',
            'ExposureProgram' => 2,
            'ISOSpeedRatings' => 64,
            'ExifVersion' => '0210',
            'DateTimeOriginal' => '2017:06:13 11:34:11',
            'DateTimeDigitized' => '2017:06:13 11:34:11',
            'ComponentsConfiguration' => '' . "\0" . '',
            'ShutterSpeedValue' => '56438/10000',
            'ApertureValue' => '200/100',
            'BrightnessValue' => '0/1',
            'ExposureBiasValue' => '0/1000000',
            'MeteringMode' => 1,
            'LightSource' => 1,
            'Flash' => 24,
            'FocalLength' => '3790/1000',
            'MakerNote' => 'M[16] [dc,1] [df,d0]',
            'UserComment' => 'ASCII' . "\0" . '' . "\0" . '' . "\0" . 'Hisilicon K3' . "\0" . '',
            'SubSecTime' => '181921',
            'SubSecTimeOriginal' => '181921',
            'SubSecTimeDigitized' => '181921',
            'FlashPixVersion' => '0100',
            'ColorSpace' => 1,
            'ExifImageWidth' => 2336,
            'ExifImageLength' => 4160,
            'InteroperabilityOffset' => 946,
            'SensingMethod' => 2,
            'FileSource' => '',
            'SceneType' => '',
            'CustomRendered' => 1,
            'ExposureMode' => 0,
            'WhiteBalance' => 0,
            'DigitalZoomRatio' => '100/100',
            'FocalLengthIn35mmFilm' => 28,
            'SceneCaptureType' => 0,
            'GainControl' => 0,
            'Contrast' => 0,
            'Saturation' => 0,
            'Sharpness' => 0,
            'SubjectDistanceRange' => 0,
        ),
    'GPS' =>
        array (
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
        ),
    'INTEROP' =>
        array (
            'InterOperabilityIndex' => 'R98',
            'InterOperabilityVersion' => '0100',
        ),
);

$encoded = json_encode($arr);

echo strlen($encoded);