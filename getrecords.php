<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\ObjectUploader;


$s3 = S3Client::factory(array(
    'version' => 'latest',
    'region'  => 'ap-south-1', //add correct region
    'credentials' => array(
      'key' => 'AKIAW7IZDPIVHPLYAXZ3',
      'secret'  => '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'
    )
  ));

echo "<pre>";
//print_r($s3);
echo "</pre>";  

try {
    //Create a S3Client
   
    // Save object to a file.
    $result = $s3->getObject(array(
        'Bucket' => 'resela-bucket',
        'Key' => 'images/1370123962'
    ));
    echo "<pre>";
    print_r($result);
    echo "</pre>";
} catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}


?>