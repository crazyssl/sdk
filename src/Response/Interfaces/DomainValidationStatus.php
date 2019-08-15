<?php

namespace Crazyssl\Response\Interfaces;

/**
 * @property-read string $domain
 * @property-read string[] $emails
 * @property-read string $method
 * @property-read string $status Sent/Processing/Valid
 * @property-read string $domainmd5hash
 * @property-read string $emails
 */
interface DomainValidationStatus
{ }
