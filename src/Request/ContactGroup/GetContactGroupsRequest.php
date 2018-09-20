<?php

namespace Sctr\Greenrope\Api\Request\ContactGroup;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("GetContactGroupsRequest")
 */
class GetContactGroupsRequest
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
