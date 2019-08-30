<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\Group;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("CreateGroupResponse")
 */
class CreateGroupResponse extends GreenropeResponse
{
    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Group_id")
     */
    protected $id;

    public function getResult()
    {
        if ($this->getSuccess()) {
            return [
                'id' => $this->id,
            ];
        }
    }
}
