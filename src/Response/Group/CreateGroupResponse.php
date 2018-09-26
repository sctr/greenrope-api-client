<?php

/*
 * Copyright 2018 SCTR Services
 *
 * Distribution and reproduction are prohibited.
 *
 * @package     greenrope-api-client
 * @copyright   SCTR Services LLC 2018
 * @license     No License (Proprietary)
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
