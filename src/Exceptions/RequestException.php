<?php
namespace Crazyssl\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class RequestException extends Exception implements HttpExceptionInterface
{
}
