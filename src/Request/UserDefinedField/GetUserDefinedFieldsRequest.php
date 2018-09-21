<?php

namespace Sctr\Greenrope\Api\Request\UserDefinedField;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("GetUserDefinedFieldsRequest")
 */
class GetUserDefinedFieldsRequest
{
    /**
     * @Serializer\XmlAttributeMap()
     */
    private $query;

    public function __construct(array $query = [])
    {
        $this->query = $query;
    }
}
