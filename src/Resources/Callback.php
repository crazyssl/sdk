<?php
namespace Crazyssl\Resources;

use Crazyssl\Resources\Abstracts\BaseResource;

class Callback extends BaseResource
{
    /**
     * PUSH回调
     *
     * @param \Closure $callback 回调方法,方法入参分别为 ['cert_issued', $domains, $crt, $ca, $not_before, $not_after, $input]
     * @return void
     */
    public function parse($callback)
    {
        return $this->client->parse($callback);
    }
}
