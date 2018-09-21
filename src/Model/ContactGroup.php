<?php

namespace Sctr\Greenrope\Api\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot(name="ContactGroup")
 */
class ContactGroup
{
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
     * @Serializer\Type("string")
     * @Serializer\SerializedName("GroupName")
     */
    protected $name;
}
