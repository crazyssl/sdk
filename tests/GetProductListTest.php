<?php
namespace Crazyssl\Tests;

use Crazyssl\Tests\Abstracts\AbstractTest;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Str;

class GetProductListTest extends AbstractTest
{
    protected $guard = 'wechat';
    /**
     * 测试登陆
     *
     * @return void
     */
    public function testLogin()
    {
        $products = [];
        $ct = mt_rand(5, 20);
        for ($i = 0; $i < $ct; $i++) {
            $product = [
                'name' => Str::random(),
                'pid' => $i,
                'class' => 'dv',
                'multidomain' => 'on',
                'ipv4' => 'on',
                'wildcard' => 'on',
                'periods' => [
                    'Quarterly'
                ],
                'brand' => 'trustocean',
            ];
            $products[$i] = $product;
        }
        app()->singleton('guzzle_handler', function () use ($products) {
            $mock = new MockHandler([
                new Response(200, [], json_encode([
                    'status' => 'success',
                    'products' => $products,
                ])),
            ]);
            return $mock;
        });

        /**
         * @var \Crazyssl\Client $sdk
         */
        $sdk = app('trustocean');
        $result = $sdk->product->getProductList();

        $this->assertEquals($ct, count($result->products));
    }
}
