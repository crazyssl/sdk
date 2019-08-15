<?php
use Crazyssl\Client as Crazyssl;

require __DIR__ . '/../vendor/autoload.php';

return new Crazyssl(TRUSTOCEAN_USERNAME, TRUSTOCEAN_PASSWORD);