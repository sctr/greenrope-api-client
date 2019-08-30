<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("AddCRMActivitiesResponse")
 */
class AddCrmActivitiesResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\CrmActivity>")
     * @Serializer\SerializedName("CRMActivities")
     * @Serializer\XmlList(entry="CRMActivity")
     */
    protected $crmActivities;

    public function getResult()
    {
        return $this->crmActivities;
    }
}
