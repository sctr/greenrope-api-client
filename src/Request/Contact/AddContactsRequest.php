<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request\Contact;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("AddContactsRequest")
 */
class AddContactsRequest extends GreenropeRequest
{
    const ALLOWED_QUERY_PARAMS = [
        'update',
    ];

    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;

    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Contact>")
     * @Serializer\SerializedName("Contacts")
     * @Serializer\XmlList(entry="Contact")
     */
    protected $contacts;
}
