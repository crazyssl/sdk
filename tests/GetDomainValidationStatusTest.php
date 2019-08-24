<?php
namespace Crazyssl\Tests;

use Crazyssl\Tests\Abstracts\AbstractTest;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Str;

class GetDomainValidationStatusTest extends AbstractTest
{
    /**
     * 测试获取域名验证状态
     *
     * @return void
     */
    public function testGetDomainValidationStatus()
    {
        app()->singleton('guzzle_handler', function () {
            $domain = Str::random(5) . '.com';

            $mock = new MockHandler([
                new Response(200, [], json_encode([
                    'status' => 'success',
                    'dcvinfo' => [
                        [
                            "domain" => $domain,
                            "emails" => [
                                "admin@" . $domain,
                                "administrator@" . $domain,
                                "hostmaster@" . $domain,
                                "postmaster@" . $domain,
                                "webmaster@" . $domain,
                            ],
                            "method" => "http",
                            "status" => "Processing",
                            "domainmd5hash" => md5($domain),
                        ],
                        [
                            "domain" => $domain,
                            "emails" => [
                                "admin@" . $domain,
                                "administrator@" . $domain,
                                "hostmaster@" . $domain,
                                "postmaster@" . $domain,
                                "webmaster@" . $domain,
                            ],
                            "method" => "https",
                            "status" => "Processing",
                            "domainmd5hash" => md5($domain),
                        ],
                        [
                            "domain" => $domain,
                            "emails" => [
                                "admin@" . $domain,
                                "administrator@" . $domain,
                                "hostmaster@" . $domain,
                                "postmaster@" . $domain,
                                "webmaster@" . $domain,
                            ],
                            "method" => "dns",
                            "status" => "Processing",
                            "domainmd5hash" => md5($domain),
                        ],
                        [
                            "domain" => $domain,
                            "emails" => [
                                "admin@" . $domain,
                                "administrator@" . $domain,
                                "hostmaster@" . $domain,
                                "postmaster@" . $domain,
                                "webmaster@" . $domain,
                            ],
                            "method" => "email",
                            "status" => "Processing",
                            "domainmd5hash" => md5($domain),
                        ],
                    ],
                ])),
            ]);
            return $mock;
        });

        /**
         * @var \Crazyssl\Client $sdk
         */
        $sdk = app('trustocean');
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