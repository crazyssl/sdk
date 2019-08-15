<?php
namespace Crazyssl\Resources;

use Crazyssl\Resources\Abstracts\BaseResource;

/**
 * @method \Crazyssl\Response\AddSSLOrderResponse addSSLOrder($pid, $period, $csr_code, $contact_email, $dcv_method, $unique_id, $domains = null, $renew = null, $organization_name = null, $organizationalUnitName = null, $registered_address_line1 = null, $registered_no = null, $country = null, $state = null, $city = null, $postal_code = null, $organization_phone = null, $date_of_incorporation = null, $contact_name = null, $contact_title = null, $contact_phone = null) Create new SSL order @link https://partner.crazyssl.com/documents/2/create-new-order
 * @method \Crazyssl\Response\GetOrderStatusResponse getOrderStatus($trustocean_id) Query SSL Issuance Status @link https://partner.crazyssl.com/documents/3/query-ssl-status
 * @method \Crazyssl\Response\GetSSLDetailsResponse getSSLDetails($trustocean_id) Fetch the details of a SSL order @link https://partner.crazyssl.com/documents/4/fetch-details
 * @method \Crazyssl\Response\GetDomainValidationStatusResponse getDomainValidationStatus($trustocean_id) Fetch Domain Validation Status for a SSL order @link https://partner.crazyssl.com/documents/5/fetch-domain-validation-status
 * @method \Crazyssl\Response\ChangeDCVMethodResponse changeDCVMethod($trustocean_id, $domain, $method) Change the DCV Method for Domain Name @link https://partner.crazyssl.com/documents/7/change-dcv-method
 * @method \Crazyssl\Response\ReTryDcvEmailOrDCVCheckResponse reTryDcvEmailOrDCVCheck($trustocean_id) Resend verification emails and retry domain verification process on CA side @link https://partner.crazyssl.com/documents/8/resend-dcv-email
 * @method \Crazyssl\Response\RemoveSanDomainResponse removeSanDomain($trustocean_id, $domain) Remove domain name from a Multi Domain SSL order @link https://partner.crazyssl.com/documents/9/remove-domains
 * @method \Crazyssl\Response\ReissueSSLOrderResponse reissueSSLOrder($trustocean_id, $csr_code, $dcv_method, $unique_id, $domains = null, $renew = null, $organization_name = null, $organizationalUnitName = null, $registered_address_line1 = null, $registered_no = null, $country = null, $state = null, $city = null, $postal_code = null, $organization_phone = null, $date_of_incorporation = null, $contact_name = null, $contact_title = null, $contact_phone = null) Create new SSL order @link https://partner.crazyssl.com/documents/2/create-new-order
 */
class Order extends BaseResource
{
}
