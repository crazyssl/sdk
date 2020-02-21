<?php
namespace Crazyssl\Resources;

use Crazyssl\Resources\Abstracts\BaseResource;

class Order extends BaseResource
{
    /**
     * Create new SSL order
     *
     * @link https://partner.crazyssl.com/documents/2/create-new-order
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
     * @return \Crazyssl\Response\AddSSLOrderResponse
     */
    public function addSSLOrder($pid, $period, $csr_code, $contact_email, $dcv_method, $unique_id, $domains = null, $renew = null, $organization_name = null, $organizationalUnitName = null, $registered_address_line1 = null, $registered_no = null, $country = null, $state = null, $city = null, $postal_code = null, $organization_phone = null, $date_of_incorporation = null, $contact_name = null, $contact_title = null, $contact_phone = null)
    {
        $parameters = $this->filter(compact(['pid', 'period', 'csr_code', 'contact_email', 'dcv_method', 'unique_id', 'domains', 'renew', 'organization_name', 'organizationalUnitName', 'registered_address_line1', 'registered_no', 'country', 'state', 'city', 'postal_code', 'organization_phone', 'date_of_incorporation', 'contact_name', 'contact_title', 'contact_phone',]));
        return $this->__call(__FUNCTION__, $parameters);
    }

    /**
     * Query SSL Issuance Status
     *
     * @link https://partner.crazyssl.com/documents/3/query-ssl-status
     *
     * @param int $trustocean_id
     *
     * @return \Crazyssl\Response\GetOrderStatusResponse
     */
    public function getOrderStatus($trustocean_id)
    {
        $parameters = $this->filter(compact(['trustocean_id',]));
        return $this->__call(__FUNCTION__, $parameters);
    }

    /**
     * Fetch the details of a SSL order
     *
     * @link https://partner.crazyssl.com/documents/4/fetch-details
     *
     * @param int $trustocean_id
     *
     * @return \Crazyssl\Response\GetSSLDetailsResponse
     */
    public function getSSLDetails($trustocean_id)
    {
        $parameters = $this->filter(compact(['trustocean_id',]));
        return $this->__call(__FUNCTION__, $parameters);
    }

    /**
     * Fetch Domain Validation Status for a SSL order
     *
     * @link https://partner.crazyssl.com/documents/5/fetch-domain-validation-status
     *
     * @param int $trustocean_id
     *
     * @return \Crazyssl\Response\GetDomainValidationStatusResponse
     */
    public function getDomainValidationStatus($trustocean_id)
    {
        $parameters = $this->filter(compact(['trustocean_id',]));
        return $this->__call(__FUNCTION__, $parameters);
    }

    /**
     * Change the DCV Method for Domain Name
     *
     * @link https://partner.crazyssl.com/documents/7/change-dcv-method
     *
     * @param int $trustocean_id
     * @param string $domain
     * @param string $method
     *
     * @return \Crazyssl\Response\ChangeDCVMethodResponse
     */
    public function changeDCVMethod($trustocean_id, $domain, $method)
    {
        $parameters = $this->filter(compact(['trustocean_id', 'domain', 'method',]));
        return $this->__call(__FUNCTION__, $parameters);
    }

    /**
     * Resend verification emails and retry domain verification process on CA side
     *
     * @link https://partner.crazyssl.com/documents/8/resend-dcv-email
     *
     * @param int $trustocean_id
     *
     * @return \Crazyssl\Response\ReTryDcvEmailOrDCVCheckResponse
     */
    public function reTryDcvEmailOrDCVCheck($trustocean_id)
    {
        $parameters = $this->filter(compact(['trustocean_id',]));
        return $this->__call(__FUNCTION__, $parameters);
    }

    /**
     * Remove domain name from a Multi Domain SSL order
     *
     * @link https://partner.crazyssl.com/documents/9/remove-domains
     *
     * @param int $trustocean_id
     *
     * @return \Crazyssl\Response\RemoveSanDomainResponse
     */
    public function removeSanDomain($trustocean_id, $domain)
    {
        $parameters = $this->filter(compact(['trustocean_id', 'domain',]));
        return $this->__call(__FUNCTION__, $parameters);
    }

    /**
     * Create new SSL order
     *
     * @link https://partner.crazyssl.com/documents/2/create-new-order
     *
     * @param int $trustocean_id
     * @param string $csr_code
     * @param string $contact_email
     * @param string $dcv_method
     * @param int $unique_id
     * @param string $domains
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
    public function reissueSSLOrder($trustocean_id, $csr_code, $dcv_method, $unique_id, $domains = null, $organization_name = null, $organizationalUnitName = null, $registered_address_line1 = null, $registered_no = null, $country = null, $state = null, $city = null, $postal_code = null, $organization_phone = null, $date_of_incorporation = null, $contact_name = null, $contact_title = null, $contact_phone = null)
    {
        $parameters = $this->filter(compact(['trustocean_id', 'csr_code', 'dcv_method', 'unique_id', 'domains', 'organization_name', 'organizationalUnitName', 'registered_address_line1', 'registered_no', 'country', 'state', 'city', 'postal_code', 'organization_phone', 'date_of_incorporation', 'contact_name', 'contact_title', 'contact_phone',]));
        return $this->__call(__FUNCTION__, $parameters);
    }

    /**
     * Cancel and refund
     *
     * @link https://support.trustocean.com/display/SPC/cancelAndRefund
     *
     * @param int $trustocean_id 必须是由 addSSLOrder 下单返回的订单号 trustocean_id
     *
     * @return \Crazyssl\Response\Interfaces\BaseResponse
     */
    public function cancelAndRefund($trustocean_id)
    {
        $parameters = $this->filter(compact(['trustocean_id',]));
        return $this->__call(__FUNCTION__, $parameters);
    }

    /**
     * 吊销
     *
     * @link https://support.trustocean.com/display/SPC/revokeSSL
     *
     * @param int $trustocean_id 必须是由 addSSLOrder 下单返回的订单号 trustocean_id
     * @param int $revocationReason 50个字符以内的终端用户吊销原因
     *
     * @return \Crazyssl\Response\Interfaces\BaseResponse
     */
    public function revokeSSL($trustocean_id, $revocationReason)
    {
        $parameters = $this->filter(compact(['trustocean_id', 'revocationReason',]));
        return $this->__call(__FUNCTION__, $parameters);
    }
}
