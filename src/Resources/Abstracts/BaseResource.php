<?php
namespace Crazyssl\Resources\Abstracts;

use Crazyssl\Client;

abstract class BaseResource
{
    /**
     * @var \Crazyssl\Client
     */
    protected $client;

    /**
     * 构造
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * 魔术
     *
     * @param string $api
     * @param array $parameters
     * @return \Crazyssl\Response\Interfaces\BaseResponse
     */
    public function __call($api, $parameters)
    {
        return $this->client->__call($api, $parameters);
    }
}
