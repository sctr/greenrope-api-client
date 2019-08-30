<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\UserDefinedField;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("DeleteUserDefinedFieldRequest")
 */
class DeleteUserDefinedFieldRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'group_id',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;

    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    protected $fieldName;
}
