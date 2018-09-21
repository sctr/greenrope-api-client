<?php

namespace Sctr\Greenrope\Api\Response\Contact;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("AddContactsResponse")
 */
class AddContactsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Contact>")
     * @Serializer\SerializedName("Contacts")
     * @Serializer\XmlList(entry="Contact")
     */
    protected $contacts;

    public function getResult()
    {
        if ($this->getErrorCode()) {
            return null;
        }

        return $this->contacts;
    }
}
