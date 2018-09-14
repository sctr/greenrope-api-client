<?php

namespace Sctr\Greenrope\Api\Model;

use JMS\Serializer\Annotation as Serializer;

class Calendar extends AbstractModel
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Calendar_id")
     */
    private $id;

    /**
     * @Serializer\Type("string)
     * @Serializer\SerializedName("Title")
     */
    private $title;

    /**
     * @Serializer\Type("string)
     * @Serializer\SerializedName("ActiveNow")
     */
    private $active;

    /**
     * @Serializer\Type("integer)
     * @Serializer\SerializedName("TotalActiveContacts")
     */
    private $totalActiveContacts;
}