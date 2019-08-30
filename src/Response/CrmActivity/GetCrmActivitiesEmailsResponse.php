<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetCRMActivitiesEmailsResponse")
 */
class GetCrmActivitiesEmailsResponse extends GreenropeResponse
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
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\SentEmail>")
     * @Serializer\XmlList(entry="SentEmail")
     */
    protected $sentEmails;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("TotalSentEmails")
     */
    protected $totalEmailsSent;

    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\QueuedBroadcast>")
     * @Serializer\XmlList(entry="QueuedBroadcast")
     */
    protected $queuedBroadcasts;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("TotalQueuedBroadcasts")
     */
    protected $totalQueuedBroadcasts;

    public function getResult()
    {
        if ($this->getSuccess()) {
            return [
                'accountNumber'         => $this->accountNumber,
                'contactId'             => $this->contactId,
                'totalEmailSent'        => $this->totalEmailsSent,
                'sentEmails'            => $this->sentEmails,
                'queuedBroadcasts'      => $this->queuedBroadcasts,
                'totalQueuedBroadcasts' => $this->totalQueuedBroadcasts,
            ];
        }
    }
}
