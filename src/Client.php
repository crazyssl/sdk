<?php

namespace Crazyssl;

use Crazyssl\Callback\Parser;
use Crazyssl\Exceptions\DoNotHavePartnerprivilegeException;
use Crazyssl\Exceptions\InsufficientBalanceException;
use Crazyssl\Exceptions\RequestException;
use Crazyssl\Resources\Callback;
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
     * @var \Crazyssl\Resources\Callback
     */
    public $callback;

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
     * @var string
     */
    protected $privateKey;

    /**
     * 构造
     *
     * @param string $username Crazyssl的API用户名 
     * @param string $password Crazyssl的API密码
     * @param string|null $apiOrigin Crazyssl的API地址
     * @param string|null $privateKey 私钥用于解密PUSH的
     */
    public function __construct($username, $password, $apiOrigin = null, $privateKey = null)
    {
        if ($apiOrigin === null) {
            $apiOrigin = self::CRAZYSSL_ORIGIN;
        }
        $this->username = $username;
        $this->password = $password;
        $this->apiOrigin = $apiOrigin;
        $this->privateKey = $privateKey;

        $this->product = new Product($this);
        $this->order = new Order($this);
        $this->callback = new Callback($this);
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
            if (!isset($json->error_code)) {
                throw new RequestException('未知错误', -1);
            }
            if (isset($map[$json->error_code])) {
                $exception_class = $map[$json->error_code];
            }
            throw new $exception_class(isset($json->message) ? $json->message : '请求接口出错', isset($json->error_code) ? $json->error_code : -1);
        }
        return $json;
    }

    /**
     * 推送回调方法
     *
     * @param \Closure $callback
     */
    public function parse($callback)
    {
        if (function_exists('request')) {
            $input = request();
        } else {
            $input = $_POST;
        }

        if (isset($input['encrypted_data'])) {
            if (!$this->privateKey) {
                throw \Exception(-2, '没有配置私钥');
            }

            $privateKey = openssl_pkey_get_private($this->privateKey);
            $data = base64_decode($input['encrypted_data']);
            $decrypt = '';
            foreach (str_split($data, 128) as $item) {
                $temp = '';
                openssl_private_decrypt($item, $temp, $privateKey);
                $decrypt .= $temp;
            }
            openssl_free_key($privateKey);
            $input = json_decode($decrypt, true);
        }

        $type = $input['type'];
        switch ($type) {
            case 'cert_issued':
            $ca = $input['ca_code'];
            $crt = $input['cert_code'];
            $domains = $input['domains'];

            $info = openssl_x509_parse($crt);

            $not_before = date('Y-m-d H:i:s', data_get($info, 'validFrom_time_t', -1));
            $not_after = date('Y-m-d H:i:s', data_get($info, 'validTo_time_t', -1));

            return $callback($type, $domains, $crt, $ca, $not_before, $not_after, $input);

            break;
        }
    }
}
