<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\Mail;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("QueueMailResponse")
 */
class QueueMailResponse extends GreenropeResponse
{
    public function getResult()
    {
        return $this->getSuccess();
    }
}
