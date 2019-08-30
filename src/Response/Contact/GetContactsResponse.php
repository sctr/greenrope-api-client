<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\Contact;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetContactsResponse")
 */
class GetContactsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Contact>")
     * @Serializer\SerializedName("Contacts")
     * @Serializer\XmlList(entry="Contact")
     */
    protected $contacts;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("TotalMatchingContacts")
     */
    protected $total;

    public function getResult()
    {
        if ($this->getSuccess()) {
            return [
                'contacts' => $this->contacts,
                'total'    => $this->total,
            ];
        }
    }
}
