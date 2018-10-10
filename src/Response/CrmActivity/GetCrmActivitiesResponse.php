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
