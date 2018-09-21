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

namespace Sctr\Greenrope\Api\Request\Event;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("AddEventsRequest")
 */
class AddEventsRequest extends GreenropeRequest
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Event>")
     * @Serializer\SerializedName("Events")
     * @Serializer\XmlList(entry="Event")
     */
    protected $events;
}
