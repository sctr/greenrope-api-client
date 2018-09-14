<?php

namespace Sctr\Greenrope\Api\Response\Contact;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("DeleteContactsResponse")
 */
class DeleteContactsResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Contact>")
     * @Serializer\SerializedName("Contacts")
     * @Serializer\XmlList(entry="Contact")
     */
    protected $contacts;

    public function getContacts()
    {
        return $this->contacts;
    }
}