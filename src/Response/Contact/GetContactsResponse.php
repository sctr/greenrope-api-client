<?php

namespace Sctr\Greenrope\Api\Response\Contact;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\ApiResponse;

/**
 * @Serializer\XmlRoot("GetContactsResponse")
 */
class GetContactsResponse
{
    use ApiResponse;

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

    public function getContacts()
    {
        return $this->contacts;
    }

    public function getTotal()
    {
        return $this->total;
    }
}