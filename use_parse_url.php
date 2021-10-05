<?php

require "vendor/autoload.php";

$guzzle = new \GuzzleHttp\Client();
$content = $guzzle->request('get', 'https://onlineitea.com.ua/course/php-advanced/');

$url = 'https://onlineitea.com.ua/course/php-advanced/';
echo 'Get host from ' . $url . PHP_EOL;
$parser = ;