<?php

namespace Sctr\Greenrope\Api\Request\Contact;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("EditContactsRequest")
 */
class EditContactsRequest
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Contact>")
     * @Serializer\SerializedName("Contacts")
     * @Serializer\XmlList(entry="Contact")
     */
    protected $contacts;

    public function __construct(array $contacts)
    {
        $this->contacts = $contacts;
    }
}