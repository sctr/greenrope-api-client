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

namespace Sctr\Greenrope\Api\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot(name="Group")
 */
class Group extends AbstractModel
{
    const ALLOWED_QUERY_PARAMS = [
        'group_id',
        'group_name',
    ];

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Group_id")
     */
    protected $id;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     */
    protected $accountNumber;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $name;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $groupName;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Group_type")
     */
    protected $type;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $emailsSentFromName;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $emailsSentFromEmail;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $emailPhysicalAddress;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     */
    protected $includeLoginLink;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     */
    protected $totalMatchingContacts;

    /**
     * @Serializer\XmlValue(cdata=false)
     * @Serializer\Type("string")
     */
    protected $value;
}
