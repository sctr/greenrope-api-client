<?php

/*
 * Copyright 2018 SCTR Services
 *
 * Distribution and reproduction are prohibited.
 *
 * @package     greenrope-api-client
 * @copyright   SCTR Services LLC 2018
 * @license     No License (Proprietary)
 */

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
            return;
        }

        return [
            'contacts' => $this->contacts,
            'total'    => $this->total,
        ];
    }
}
