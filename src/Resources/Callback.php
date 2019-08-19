<?php
namespace Crazyssl\Resources;

use Crazyssl\Resources\Abstracts\BaseResource;

/**
 * @method void parse(\Closure $callback) PUSH回调,支持一个方法,方法入参分别为 ['cert_issued', $domains, $crt, $ca, $not_before, $not_after, $input]
 */
class Callback extends BaseResouce
{
}
