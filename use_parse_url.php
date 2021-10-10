<?php

require "vendor/autoload.php";

$url = 'https://onlineitea.com.ua/course/php-advanced/';
echo 'Get host from ' . $url;

$parser = new \Parser\Parser();
echo "Host name is " . $parser->get_host($url);