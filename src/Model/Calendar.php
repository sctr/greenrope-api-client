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
     */
    private $title;

    /**
     * @Serializer\Type("string)
     * @Serializer\SerializedName("ActiveNow")
     */
    private $active;

    /**
     * @Serializer\Type("integer)
     */
    private $totalActiveContacts;
}
