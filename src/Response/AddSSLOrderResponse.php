<?php
namespace Crazyssl\Response;

use Crazyssl\Response\Interfaces\BaseResponse;

/**
 * @property-read string $vendor_id
 * @property-read string $cert_status
 * @property-read \Crazyssl\Response\Interfaces\DomainDcvInfo[] $dcv_info
 * @property-read string $unique_id
 * @property-read string $created_at
 * @property-read int $trustocean_id
 * @property-read string $csr_code
 * @property-read string $contact_email
 * @property-read string[] $domains
 * @property-read int $renew
 * @property-read int $reissue
 * @property-read array|null $org_info
 */
class AddSSLOrderResponse implements BaseResponse
{
}
