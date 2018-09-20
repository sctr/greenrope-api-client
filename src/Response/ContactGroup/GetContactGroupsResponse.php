<?php

namespace Sctr\Greenrope\Api\Response\ContactGroup;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetContactGroupsResponse")
 */
class GetContactGroupsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\ContactGroup>")
     * @Serializer\SerializedName("ContactGroups")
     * @Serializer\XmlList(entry="ContactGroup")
     */
    protected $contactGroups;

    public function getResult()
    {
        if ($this->getErrorCode()) {
            return null;
        }

        return $this->contactGroups;
    }
}
