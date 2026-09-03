<?php

include __DIR__.'/FGDependenciesLoader.php';
$loader = new \FGDependenciesLoader\FGDependenciesLoader();

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use Brick\DateTime\LocalDate;
use Brick\DateTime\TimeZone;


function handler($event, $context)
{
  global $loader;

  $logger = $context->getLogger();

  $logger->info('Function name: ' . $context->getFunctionName());
  $logger->info("FGDependenciesLoader loaded dependencies: " . implode(", ", $loader->getLoaded()));

  $logger->info('Local date: ' . LocalDate::now(TimeZone::utc()));

  $client = new Client();
  $request = new Request('GET', 'https://api.github.com');
  $response = $client->send($request);
  $logger->info('Response status code: ' . $response->getStatusCode());
  $logger->info('Response body: ' . $response->getBody()->getContents());
  


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