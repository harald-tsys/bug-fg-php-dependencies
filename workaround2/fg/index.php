<?php

# Project dependencies autoloading
if (file_exists(__DIR__ . '/dependencies/autoload.php')) {
    require_once __DIR__ . '/dependencies/autoload.php';
}

# FG dependencies "brick-date-time" autoloading 
if (file_exists(__DIR__ . '/vendor_brick-date-time/autoload.php')) {
    require_once __DIR__ . '/vendor_brick-date-time/autoload.php';
}

# FG dependency "guzzle-php" autoloading 
if (file_exists(__DIR__ . '/vendor_guzzle-php/autoload.php')) {
    require_once __DIR__ . '/vendor_guzzle-php/autoload.php';
}

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use Brick\DateTime\LocalDate;
use Brick\DateTime\TimeZone;


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