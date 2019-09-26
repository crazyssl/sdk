<?php
namespace Crazyssl\Mock;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Str;

class ProductMock
{
    /**
     * Get the list of all SSL Products 接口, 模拟
     *
     * @return void
     */
    public function getProductList()
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

        return $products;
    }
}
