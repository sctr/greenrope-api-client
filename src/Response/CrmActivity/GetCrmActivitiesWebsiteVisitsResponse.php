<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetCRMActivitiesWebsiteVisitsResponse")
 */
class GetCrmActivitiesWebsiteVisitsResponse extends GreenropeResponse
{
    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     */
    protected $accountNumber;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Contact_id")
     */
    protected $contactId;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\WebsiteVisit>")
     * @Serializer\XmlList(entry="WebsiteVisit")
     */
    protected $websiteVisits;

    public function getResult()
    {
        if ($this->getSuccess()) {
            return [
                'accountNumber' => $this->accountNumber,
                'contactId'     => $this->contactId,
                'websiteVisits' => $this->websiteVisits,
            ];
        }
    }
}
