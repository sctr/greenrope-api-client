<?php

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
        if ($this->getErrorCode()) {
            return null;
        }

        return $this->broadcasts;
    }
}
