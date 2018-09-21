<?php

namespace Sctr\Greenrope\Api\Request\Group;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("EditGroupsRequest")
 */
class EditGroupsRequest
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Group>")
     * @Serializer\SerializedName("Groups")
     * @Serializer\XmlList(entry="Group")
     */
    protected $groups;

    public function __construct(array $groups)
    {
        $this->groups = $groups;
    }
}
