<?php
namespace Crazyssl\Mock;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Str;

class OrderMock
{
    /**
     * 创建新订单 mock
     *
     * @param int $pid
     * @param string $period
     * @param string $csr_code
     * @param string $contact_email
     * @param string $dcv_method
     * @param int $unique_id
     * @param string $domains
     * @param int $renew
     * @param string|null $organization_name
     * @param string|null $organizationalUnitName
     * @param string|null $registered_address_line1
     * @param string|null $registered_no
     * @param string|null $country
     * @param string|null $state
     * @param string|null $city
     * @param string|null $postal_code
     * @param string|null $organization_phone
     * @param string|null $date_of_incorporation
     * @param string|null $contact_name
     * @param string|null $contact_title
     * @param string|null $contact_phone
     *
     * @return void
     */
    public function addSSLOrder($pid, $period, $csr_code, $contact_email, $dcv_method, $unique_id, $domains = null, $renew = null, $organization_name = null, $organizationalUnitName = null, $registered_address_line1 = null, $registered_no = null, $country = null, $state = null, $city = null, $postal_code = null, $organization_phone = null, $date_of_incorporation = null, $contact_name = null, $contact_title = null, $contact_phone = null)
    {
        app()->singleton('guzzle_handler', function () use ($pid, $period, $csr_code, $contact_email, $dcv_method, $unique_id, $domains, $renew, $organization_name, $organizationalUnitName, $registered_address_line1, $registered_no, $country, $state, $city, $postal_code, $organization_phone, $date_of_incorporation, $contact_name, $contact_title, $contact_phone) {
            $domain = Str::random(5) . '.com';

            $mock = new MockHandler([
                new Response(200, [], json_encode([
                    'status' => 'success',
                    'vendor_id' => 192847737,
                    'cert_status' => 'enroll_caprocessing',
                    'dcv_info' => collect(explode(',', $domains))->map(function ($domain) {
                        return [
                            'domain' => $domain,
                            'status' => 'needverification',
                            'method' => 'http',
                            'email' => '',
                            'isip' => false,
                            'subdomain' => '',
                            'topdomain' => $domain,
                            'http_verifylink' => 'http://trustocean.com/.well-know/pki-validation/9BBE6D86D535A3EF6E8008975AC6A0BE.txt',
                            'http_filename' => '9BBE6D86D535A3EF6E8008975AC6A0BE.txt',
                            'http_filecontent' => '70030c1e989f209855aea0013d92ee9f1f56cca9794a7e9a9353975e7fa7be59\ncomodoca.com\ntestorder02',
                        ];
                    })->keyBy('domain'),
                    'unique_id' => 'testorder02',
                    'created_at' => '2018-12-14 14:57:33',
                    'trustocean_id' => 1908,
                    'csr_code' => '-----BEGIN CERTIFICATE REQUEST-----\nMIIC/jCCAeYCAQAwgbgxCzAJBgNVBAYTAkNOMRAwDgYDVQQIDAdTaGFhbnhpMQ0w\nCwYDVQQHDARYaWFuMSMwIQYDVQQKDBpRaWFvS3IgQ29ycG9yYXRpb24gTGltaXRl\nZDEjMCEGA1UECwwaUWlhb0tyIENvcnBvcmF0aW9uIExpbWl0ZWQxGzAZBgNVBAMM\nEm15LmZ1bGwuZG9tYWluLnRsZDEhMB8GCSqGSIb3DQEJARYSc3VwcG9ydEBxaWFv\na3IuY29tMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtiZi/0Z6UUGR\ni4c2t0+kDyTdwhYUgEzytbIzSutFnz6WIusISCExy3S7C27CUVmVuY1Qpv9cR1bq\nmEpwe+j/AB5nH7Pc06rStmpRTb7OWRDMMIm/2MAXQ06w4de4IvURWM2M4b0x5kha\nGOvgx3bDcYuo4eHHHa+q9iZU+dkWdN30AXCazWfTk1cYGwLOamZHQZr1D+XjplV9\nUmp1mqNFPVNvBgua1CzhwqOKnADeeptNBl9ez45Zx2Xq/XS9YNboOM+g+45/qjuY\nC46ECfoggZk+6W4irykaR/yfo2/5ScYGRy0XvX6JLfGsUHF85L60g70+zYvDmYvK\nAoI2GwkmFQIDAQABoAAwDQYJKoZIhvcNAQEFBQADggEBAB4Mw7XUfC9xrzApXcI8\nQQ60mz37OvGgg2TftKK2GKiOo7B3mYwC8cVDKq1s31CukBOnOduvI206V1v/sbkW\no1STQ7MuUMnrp8P+mgQHyYBttnN+g8HyEDueH7KOjYD9rKfAaDaaJyxSPStHwEhK\nfdSmbWTVAmc2VFp8jhMY2vjx9A6XuoDnyc2eXY6r2V6n/HTw/2YT0jCJFUxnNcCF\n54AybyBdU1eBsnOvTWPmNAYikw1aoWYz2+xwOBQ7+5UYeVrdkhRTwnrJluVr+jgb\nvIwyQM92B6gzi1zXU/cqpEnOpkUVnkp4H1Y4N+D09iYqwaS+VBmrV0vbbebQTKEN\nJUg=\n-----END CERTIFICATE REQUEST-----',
                    'contact_email' => 'idev@qiaokr.com',
                    'domains' => explode(',', $domains),
                ])),
            ]);
            return $mock;
        });
    }


    /**
     * Reissue SSL order Mock
     *
     * @link https://partner.crazyssl.com/documents/2/create-new-order
     *
     * @param int $trustocean_id
     * @param string $csr_code
     * @param string $contact_email
     * @param string $dcv_method
     * @param int $unique_id
     * @param string $domains
     * @param int $renew
     * @param string|null $organization_name
     * @param string|null $organizationalUnitName
     * @param string|null $registered_address_line1
     * @param string|null $registered_no
     * @param string|null $country
     * @param string|null $state
     * @param string|null $city
     * @param string|null $postal_code
     * @param string|null $organization_phone
     * @param string|null $date_of_incorporation
     * @param string|null $contact_name
     * @param string|null $contact_title
     * @param string|null $contact_phone
     *
     * @return \Crazyssl\Response\ReissueSSLOrderResponse
     */
    public function reissueSSLOrder($trustocean_id, $csr_code, $dcv_method, $unique_id, $domains = null, $renew = null, $organization_name = null, $organizationalUnitName = null, $registered_address_line1 = null, $registered_no = null, $country = null, $state = null, $city = null, $postal_code = null, $organization_phone = null, $date_of_incorporation = null, $contact_name = null, $contact_title = null, $contact_phone = null)
    {
        app()->singleton('guzzle_handler', function () use ($trustocean_id, $csr_code, $dcv_method, $unique_id, $domains, $renew, $organization_name, $organizationalUnitName, $registered_address_line1, $registered_no, $country, $state, $city, $postal_code, $organization_phone, $date_of_incorporation, $contact_name, $contact_title, $contact_phone) {
            $domain = Str::random(5) . '.com';

            $mock = new MockHandler([
                new Response(200, [], json_encode([
                    'status' => 'success',
                    'vendor_id' => 192847737,
                    'cert_status' => 'enroll_caprocessing',
                    'dcv_info' => collect(explode(',', $domains))->map(function ($domain) {
                        return [
                            'domain' => $domain,
                            'status' => 'needverification',
                            'method' => 'http',
                            'email' => '',
                            'isip' => false,
                            'subdomain' => '',
                            'topdomain' => $domain,
                            'http_verifylink' => 'http://trustocean.com/.well-know/pki-validation/9BBE6D86D535A3EF6E8008975AC6A0BE.txt',
                            'http_filename' => '9BBE6D86D535A3EF6E8008975AC6A0BE.txt',
                            'http_filecontent' => '70030c1e989f209855aea0013d92ee9f1f56cca9794a7e9a9353975e7fa7be59\ncomodoca.com\ntestorder02',
                        ];
                    })->keyBy('domain'),
                    'unique_id' => 'testorder02',
                    'created_at' => '2018-12-14 14:57:33',
                    'trustocean_id' => 1908,
                    'csr_code' => '-----BEGIN CERTIFICATE REQUEST-----\nMIIC/jCCAeYCAQAwgbgxCzAJBgNVBAYTAkNOMRAwDgYDVQQIDAdTaGFhbnhpMQ0w\nCwYDVQQHDARYaWFuMSMwIQYDVQQKDBpRaWFvS3IgQ29ycG9yYXRpb24gTGltaXRl\nZDEjMCEGA1UECwwaUWlhb0tyIENvcnBvcmF0aW9uIExpbWl0ZWQxGzAZBgNVBAMM\nEm15LmZ1bGwuZG9tYWluLnRsZDEhMB8GCSqGSIb3DQEJARYSc3VwcG9ydEBxaWFv\na3IuY29tMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtiZi/0Z6UUGR\ni4c2t0+kDyTdwhYUgEzytbIzSutFnz6WIusISCExy3S7C27CUVmVuY1Qpv9cR1bq\nmEpwe+j/AB5nH7Pc06rStmpRTb7OWRDMMIm/2MAXQ06w4de4IvURWM2M4b0x5kha\nGOvgx3bDcYuo4eHHHa+q9iZU+dkWdN30AXCazWfTk1cYGwLOamZHQZr1D+XjplV9\nUmp1mqNFPVNvBgua1CzhwqOKnADeeptNBl9ez45Zx2Xq/XS9YNboOM+g+45/qjuY\nC46ECfoggZk+6W4irykaR/yfo2/5ScYGRy0XvX6JLfGsUHF85L60g70+zYvDmYvK\nAoI2GwkmFQIDAQABoAAwDQYJKoZIhvcNAQEFBQADggEBAB4Mw7XUfC9xrzApXcI8\nQQ60mz37OvGgg2TftKK2GKiOo7B3mYwC8cVDKq1s31CukBOnOduvI206V1v/sbkW\no1STQ7MuUMnrp8P+mgQHyYBttnN+g8HyEDueH7KOjYD9rKfAaDaaJyxSPStHwEhK\nfdSmbWTVAmc2VFp8jhMY2vjx9A6XuoDnyc2eXY6r2V6n/HTw/2YT0jCJFUxnNcCF\n54AybyBdU1eBsnOvTWPmNAYikw1aoWYz2+xwOBQ7+5UYeVrdkhRTwnrJluVr+jgb\nvIwyQM92B6gzi1zXU/cqpEnOpkUVnkp4H1Y4N+D09iYqwaS+VBmrV0vbbebQTKEN\nJUg=\n-----END CERTIFICATE REQUEST-----',
                    'contact_email' => 'idev@qiaokr.com',
                    'domains' => explode(',', $domains),
                ])),
            ]);
            return $mock;
        });
    }

    /**
     * 获取域名 DCV 接口, 模拟
     *
     * @return void
     */
    public function getDomainValidationStatus()
    {
        app()->singleton('guzzle_handler', function () {
            $domain = Str::random(5) . '.com';

            $mock = new MockHandler([
                new Response(200, [], json_encode([
                    'status' => 'success',
                    'dcvinfo' => collect(['http', 'https', 'dns', 'email',])->map(function ($method) use ($domain) {
                        return [
                            "domain" => $domain,
                            "emails" => [
                                "admin@" . $domain,
                                "administrator@" . $domain,
                                "hostmaster@" . $domain,
                                "postmaster@" . $domain,
                                "webmaster@" . $domain,
                            ],
                            "method" => $method,
                            "status" => "Processing",
                            "domainmd5hash" => md5($domain),
                        ];
                    }),
                ])),
            ]);
            return $mock;
        });
    }
}
