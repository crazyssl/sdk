<?php
namespace Crazyssl\Tests;

use Crazyssl\Tests\Abstracts\AbstractTest;

class AddSSLOrderTest extends AbstractTest
{
    /**
     * 申购测试
     *
     * @return void
     */
    public function testAddSSLOrder()
    {
        /**
         * @var \Crazyssl\Client $sdk
         */
        $sdk = app('trustocean');

        $csr = "-----BEGIN CERTIFICATE REQUEST-----\nMIIC/jCCAeYCAQAwgbgxCzAJBgNVBAYTAkNOMRAwDgYDVQQIDAdTaGFhbnhpMQ0w\nCwYDVQQHDARYaWFuMSMwIQYDVQQKDBpRaWFvS3IgQ29ycG9yYXRpb24gTGltaXRl\nZDEjMCEGA1UECwwaUWlhb0tyIENvcnBvcmF0aW9uIExpbWl0ZWQxGzAZBgNVBAMM\nEm15LmZ1bGwuZG9tYWluLnRsZDEhMB8GCSqGSIb3DQEJARYSc3VwcG9ydEBxaWFv\na3IuY29tMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtiZi/0Z6UUGR\ni4c2t0+kDyTdwhYUgEzytbIzSutFnz6WIusISCExy3S7C27CUVmVuY1Qpv9cR1bq\nmEpwe+j/AB5nH7Pc06rStmpRTb7OWRDMMIm/2MAXQ06w4de4IvURWM2M4b0x5kha\nGOvgx3bDcYuo4eHHHa+q9iZU+dkWdN30AXCazWfTk1cYGwLOamZHQZr1D+XjplV9\nUmp1mqNFPVNvBgua1CzhwqOKnADeeptNBl9ez45Zx2Xq/XS9YNboOM+g+45/qjuY\nC46ECfoggZk+6W4irykaR/yfo2/5ScYGRy0XvX6JLfGsUHF85L60g70+zYvDmYvK\nAoI2GwkmFQIDAQABoAAwDQYJKoZIhvcNAQEFBQADggEBAB4Mw7XUfC9xrzApXcI8\nQQ60mz37OvGgg2TftKK2GKiOo7B3mYwC8cVDKq1s31CukBOnOduvI206V1v/sbkW\no1STQ7MuUMnrp8P+mgQHyYBttnN+g8HyEDueH7KOjYD9rKfAaDaaJyxSPStHwEhK\nfdSmbWTVAmc2VFp8jhMY2vjx9A6XuoDnyc2eXY6r2V6n/HTw/2YT0jCJFUxnNcCF\n54AybyBdU1eBsnOvTWPmNAYikw1aoWYz2+xwOBQ7+5UYeVrdkhRTwnrJluVr+jgb\nvIwyQM92B6gzi1zXU/cqpEnOpkUVnkp4H1Y4N+D09iYqwaS+VBmrV0vbbebQTKEN\nJUg=\n-----END CERTIFICATE REQUEST-----";
        $email = 'test@test.com';

        $arguments = [1, 'Quarty', $csr, $email, 'dns', 1, 'www.test.com,www.test2.com', false, null, null, null, null, null, null, null, null, null, null, null, null, null, null];
        call_user_func_array([$sdk->order_mock, 'addSSLOrder'], $arguments);
        $order = call_user_func_array([$sdk->order, 'addSSLOrder'], $arguments);

        $this->assertEquals('success', $order->status);
        $this->assertObjectHasAttribute('dcv_info', $order);
    }
}
