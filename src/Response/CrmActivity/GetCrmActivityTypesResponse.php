<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetCRMActivityTypesResponse")
 */
class GetCrmActivityTypesResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\CrmActivityType>")
     * @Serializer\SerializedName("CRMActivityTypes")
     * @Serializer\XmlList(entry="CRMActivityType",)
     */
    protected $crmActivityTypes;

    public function getResult()
    {
        return $this->crmActivityTypes;
    }
}
