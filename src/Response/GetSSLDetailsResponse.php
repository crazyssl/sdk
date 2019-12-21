<?php

namespace Crazyssl\Response;

use Crazyssl\Response\Interfaces\BaseResponse;

/**
 * @property string $cert_code
 * @property string $ca_code
 * @property int $certificate_delivery_time
 * @property int $reissue
 * @property string $created_at
 * @property string $reissued_at
 */
class GetSSLDetailsResponse extends AddSSLOrderResponse implements BaseResponse
{
}
