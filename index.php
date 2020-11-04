<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\ObjectUploader;

// $s3Client = new S3Client([
//     'region' => 'ap-south-1',
//     'version' => '2006-03-01'
// ]);

//$bucket = 'resela-bucket';
//$key = 'AKIAW7IZDPIVHPLYAXZ3';

// Using stream instead of file path
#$source = fopen('api.png', 'rb');

$bucket = 'resela-bucket';
$keyname = rand();
// $filepath should be absolute path to a file on disk                      
$filepath = 'api.png';

// Instantiate the client.
$s3 = S3Client::factory(array(
    'version' => 'latest',
    'region'  => 'ap-south-1', //add correct region
    'credentials' => array(
      'key' => '###',
      'secret'  => '####'
    )
  ));

// Upload a file.
$result = $s3->putObject(array(
    'Bucket'       => $bucket,
    'Key'          => 'images/'.$keyname,
    'SourceFile'   => $filepath,
    'ContentType'  => 'text/plain',
    'ACL'          => 'public-read',
    'StorageClass' => 'REDUCED_REDUNDANCY',
    'Metadata'     => array(    
        'param1' => 'value 1',
        'param2' => 'value 2'
    )
));

echo $result['ObjectURL'];
?>
