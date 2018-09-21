<?php

namespace Sctr\Greenrope\Api\Response\Group;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("EditGroupsResponse")
 */
class EditGroupsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Group>")
     * @Serializer\SerializedName("Groups")
     * @Serializer\XmlList(entry="Group")
     */
    protected $groups;

    public function getResult()
    {
        if ($this->getErrorCode()) {
            return null;
        }

        return $this->groups;
    }
}
