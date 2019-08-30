<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetCRMActivitiesResponse")
 */
class GetCrmActivitiesResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\CrmActivity>")
     * @Serializer\SerializedName("CRMActivities")
     * @Serializer\XmlList(entry="CRMActivity")
     */
    protected $crmActivities;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("TotalMatchingActivities")
     */
    protected $total;

    public function getResult()
    {
        if ($this->getSuccess()) {
            return [
                'contacts' => $this->crmActivities,
                'total'    => $this->total,
            ];
        }
    }
}
