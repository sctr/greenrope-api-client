<?php

/*
 * Copyright 2018 SCTR Services
 *
 * Distribution and reproduction are prohibited.
 *
 * @package     greenrope-api-client
 * @copyright   SCTR Services LLC 2018
 * @license     No License (Proprietary)
 */

namespace Sctr\Greenrope\Api\Request\ContactGroup;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetContactGroupsRequest")
 */
class GetContactGroupsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'account_id',
        'contact_id',
        'firstname',
        'lastname',
        'email',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
