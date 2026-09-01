<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use Brick\DateTime\LocalDate;
use Brick\DateTime\TimeZone;


function ListDependenciesHandler($event, $context)
{
  $logger = $context->getLogger();
  $logger->info('Listing dependencies...');

  $path = __DIR__ . '/vendor';
  $dir = new DirectoryIterator($path);

  foreach ($dir as $file) {
    $logger->info($file->getPathname());
  }
}

function DisplayFileHandler($event, $context)
{
  $logger = $context->getLogger();
  
  $path = __DIR__ . '/vendor/composer/autoload_psr4.php';
  
  if (file_exists($path)) {  
    $logger->info('Displaying contents of file: ' . $path);
    $contents = file_get_contents($path);
    $logger->info($contents);
  } else {
    $logger->info('File not found: ' . $path);
  }
}


function handler($event, $context)
{
  $logger = $context->getLogger();

  $logger->info('Function name: ' . $context->getFunctionName());

  $client = new Client();
  $request = new Request('GET', 'https://api.github.com');
  $response = $client->send($request);
  $logger->info('Response status code: ' . $response->getStatusCode());
  $logger->info('Response body: ' . $response->getBody()->getContents());
  $logger->info('Local date: ' . LocalDate::now(TimeZone::utc()));


  $output = [
    'statusCode' => 200,
    'headers' => [
      'Content-Type' => 'application/json',
    ],
    'isBase64Encoded' => false,
    'body' => json_encode($event),
  ];

  return $output;
}