<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\Mail;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("SendTestMailResponse")
 */
class SendTestMailResponse extends GreenropeResponse
{
    public function getResult()
    {
        return $this->getSuccess();
    }
}
