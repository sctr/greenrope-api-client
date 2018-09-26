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

namespace Sctr\Greenrope\Api\Response;

use JMS\Serializer\Annotation as Serializer;

class ApiAuthTokenResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Token")
     */
    private $token;

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->token;
    }
}
