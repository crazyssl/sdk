<?php

namespace Crazyssl;

use Crazyssl\Exceptions\DoNotHavePartnerprivilegeException;
use Crazyssl\Exceptions\InsufficientBalanceException;
use Crazyssl\Exceptions\RequestException;
use Crazyssl\Resources\Order;
use Crazyssl\Resources\Product;
use GuzzleHttp\Client as GuzzleHttpClient;

use function GuzzleHttp\json_decode;

/**
 * Sdk main class
 */
class Client
{
    const CRAZYSSL_ORIGIN = 'https://api.crazyssl.com/ssl/v5';
    const TRUSTOCEAN_ORIGIN = 'https://api.trustocean.com/ssl/v3';

    const CODE_EXCEPTION_MAP = [
        770039 => InsufficientBalanceException::class,
        778803 => DoNotHavePartnerprivilegeException::class,
    ];

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

        if (!isset($json->status) || $json->status != 'success') {
            $exception_class = RequestException::class;
            $map = self::CODE_EXCEPTION_MAP;
            if (isset($map[$json->error_code])) {
                $exception_class = $map[$json->error_code];
            }
            throw new $exception_class(isset($json->message) ? $json->message : '请求接口出错', isset($json->error_code) ? $json->error_code : -1);
        }
        return $json;
    }
}
