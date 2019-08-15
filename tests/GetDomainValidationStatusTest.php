<?php

/**
 * @var \Crazyssl\Client $sdk
 */
$sdk = require_once('autoload.php');
$domain_validation = $sdk->order->getDomainValidationStatus('1', '1');
$domain_validation->dcvinfo[0]->
