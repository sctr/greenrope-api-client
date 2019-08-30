<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\UserDefinedField;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("GetUserDefinedFieldsRequest")
 */
class GetUserDefinedFieldsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'updated_timestamp',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;
}
