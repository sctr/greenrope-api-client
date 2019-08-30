<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\Contact;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetContactGroupsResponse")
 */
class GetContactGroupsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Group>")
     * @Serializer\SerializedName("ContactGroups")
     * @Serializer\XmlList(entry="ContactGroup")
     */
    protected $contactGroups;

    public function getResult()
    {
        return $this->contactGroups;
    }
}
