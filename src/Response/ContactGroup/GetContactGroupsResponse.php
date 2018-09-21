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
            return;
        }

        return $this->contactGroups;
    }
}
