<?php

namespace Sctr\Greenrope\Api\Response\Contact;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("GetContactsResponse")
 */
class GetContactsResponse
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
        return [
            'contacts' => $this->contacts,
            'total' => $this->total
        ];
    }
}
