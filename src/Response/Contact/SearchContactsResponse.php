<?php

namespace Sctr\Greenrope\Api\Response\Contact;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetContactsResponse")
 */
class SearchContactsResponse extends GreenropeResponse
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
        if ($this->getErrorCode()) {
            return null;
        }

        return [
            'contacts' => $this->contacts,
            'total' => $this->total
        ];
    }
}
