<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetAllCRMActivitiesWebsiteVisitsResponse")
 */
class GetAllCrmActivitiesWebsiteVisitsResponse extends GreenropeResponse
{
    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("AccountNum")
     */
    protected $accountNumber;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\WebsiteVisit>")
     * @Serializer\XmlList(entry="WebsiteVisit")
     */
    protected $websiteVisits;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     */
    protected $totalWebsiteVisits;

    public function getResult()
    {
        if ($this->getSuccess()) {
            return [
                'accountNumber'      => $this->accountNumber,
                'websiteVisits'      => $this->websiteVisits,
                'totalWebsiteVisits' => $this->totalWebsiteVisits,
            ];
        }
    }
}
