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

namespace Sctr\Greenrope\Api\Response\Broadcast;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetBroadcastsResponse")
 */
class GetBroadcastsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Broadcast>")
     * @Serializer\SerializedName("Broadcasts")
     * @Serializer\XmlList(entry="Broadcast")
     */
    protected $broadcasts;

    public function getResult()
    {
        return $this->broadcasts;
    }
}
