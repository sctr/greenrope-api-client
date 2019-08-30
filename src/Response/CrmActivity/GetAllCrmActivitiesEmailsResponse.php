<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetAllCRMActivitiesEmailsResponse")
 */
class GetAllCrmActivitiesEmailsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\SentEmail>")
     * @Serializer\XmlList(entry="SentEmail")
     */
    protected $sentEmails;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     */
    protected $totalSentEmails;

    public function getResult()
    {
        if ($this->getSuccess()) {
            return [
                'sentEmails'      => $this->sentEmails,
                'totalSentEmails' => $this->totalSentEmails,
            ];
        }
    }
}
