<?php
use Crazyssl\Client as Crazyssl;

require __DIR__ . '/../vendor/autoload.php';

return new Crazyssl(env('TRUSTOCEAN_USERNAME'), env('TRUSTOCEAN_PASSWORD'));