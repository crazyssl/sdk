<?php
namespace Crazyssl\Tests;

use Crazyssl\Tests\Abstracts\AbstractTest;

class GetProductListTest extends AbstractTest
{
    /**
     * 测试列出产品
     *
     * @return void
     */
    public function testProductList()
    {
        /**
         * @var \Crazyssl\Client $sdk
         */
        $sdk = app('trustocean');
        $products = $sdk->product_mock->getProductList();

        $result = $sdk->product->getProductList();

        $this->assertEquals(count($products), count($result->products));
    }
}
