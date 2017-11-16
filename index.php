<?php
require 'vendor/autoload.php';
use \Header\Types;

$header_bag = new \Header\Bag();
$header = new \Header\Header($header_bag);

$header_bag->set(Types::LOCATION, 'www.example.com');
$header->commit(200);
