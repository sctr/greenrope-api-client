<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\Group;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetGroupsResponse")
 */
class GetGroupsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Group>")
     * @Serializer\SerializedName("Groups")
     * @Serializer\XmlList(entry="Group")
     */
    protected $groups;

    public function getResult()
    {
        return $this->groups;
    }
}
