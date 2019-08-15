<?php

namespace Crazyssl;

use Crazyssl\Resources\Order;
use Crazyssl\Resources\Product;
use GuzzleHttp\Client as GuzzleHttpClient;

use function GuzzleHttp\json_decode;

/**
 * Sdk main class
 */
class Client
{
    const CRAZYSSL_ORIGIN = 'https://api.crazyssl.com/ssl/v2';
    const TRUSTOCEAN_ORIGIN = 'https://api.trustocean.com/ssl/v3';

    /**
     * @var \Crazyssl\Resources\Product
     */
    public $product;

    /**
     * @var \Crazyssl\Resources\Order
     */
    public $order;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $apiOrigin;

    /**
     * 构造
     *
     * @param string $username Crazyssl的API用户名 
     * @param string $password Crazyssl的API密码
     * @param string $apiOrigin Crazyssl的API地址
     */
    public function __construct($username, $password, $apiOrigin = null)
    {
        if ($apiOrigin === null) {
            $apiOrigin = self::CRAZYSSL_ORIGIN;
        }
        $this->username = $username;
        $this->password = $password;
        $this->apiOrigin = $apiOrigin;

        $this->product = new Product($this);
        $this->order = new Order($this);
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
        $http = new GuzzleHttpClient();

        $parameters = array_merge(['username' => $this->username, 'password' => $this->password], (array) $parameters);

        $uri = $this->apiOrigin . '/' . $api;

        $response = $http->post($uri, [
            'form_params' => $parameters,
        ]);

        $json = json_decode($response->getBody());

        return $json;
    }
}
