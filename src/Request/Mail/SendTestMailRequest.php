<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\Mail;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("SendTestMailRequest")
 */
class SendTestMailRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'Group_id',
        'Group_name',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;

    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("From_name")
     */
    protected $fromName;

    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     * @Serializer\SerializedName("From_email")
     */
    protected $fromEmail;

    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    protected $subject;

    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    protected $message;

    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\XmlList(entry="Recipient")
     * @Serializer\Type("array")
     */
    protected $recipients;
}
