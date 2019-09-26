<?php
namespace Crazyssl\Tests;

use Crazyssl\Tests\Abstracts\AbstractTest;

class GetDomainValidationStatusTest extends AbstractTest
{
    /**
     * 测试获取域名验证状态
     *
     * @return void
     */
    public function testGetDomainValidationStatus()
    {
        /**
         * @var \Crazyssl\Client $sdk
         */
        $sdk = app('trustocean');
        $sdk->order_mock->getDomainValidationStatus();

        $domain_validation = $sdk->order->getDomainValidationStatus('1');

        $dns_dcv = collect($domain_validation->dcvinfo)->where('method', 'dns')->first();
        $http_dcv = collect($domain_validation->dcvinfo)->where('method', 'http')->first();
        $https_dcv = collect($domain_validation->dcvinfo)->where('method', 'https')->first();
        $email_dcv = collect($domain_validation->dcvinfo)->where('method', 'email')->first();

        $this->assertObjectHasAttribute('status', $dns_dcv);
        $this->assertObjectHasAttribute('status', $http_dcv);
        $this->assertObjectHasAttribute('status', $https_dcv);
        $this->assertObjectHasAttribute('status', $email_dcv);

        $this->assertObjectHasAttribute('domain', $dns_dcv);
        $this->assertObjectHasAttribute('domain', $http_dcv);
        $this->assertObjectHasAttribute('domain', $https_dcv);
        $this->assertObjectHasAttribute('domain', $email_dcv);

        $this->assertObjectHasAttribute('domainmd5hash', $dns_dcv);
        $this->assertObjectHasAttribute('domainmd5hash', $http_dcv);
        $this->assertObjectHasAttribute('domainmd5hash', $https_dcv);
        $this->assertObjectHasAttribute('domainmd5hash', $email_dcv);

        $this->assertObjectHasAttribute('emails', $dns_dcv);
        $this->assertObjectHasAttribute('emails', $http_dcv);
        $this->assertObjectHasAttribute('emails', $https_dcv);
        $this->assertObjectHasAttribute('emails', $email_dcv);
    }
}
