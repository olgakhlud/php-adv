<?php

require "vendor/autoload.php";

$guzzle = new \GuzzleHttp\Client();
$content = $guzzle->request('get', 'https://onlineitea.com.ua/course/php-advanced/');

echo $content->getBody()->getContents();

