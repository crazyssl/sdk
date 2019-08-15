<?php
/**
 * @var \Crazyssl\Client $sdk
 */
$sdk = require_once('autoload.php');
$result = $sdk->product->getProductList();

foreach ($result->products as $product) {
    print_r($product-> . PHP_EOL);
}