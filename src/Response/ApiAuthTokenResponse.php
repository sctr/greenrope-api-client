<?php

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
        return  $this->token;
    }
}
