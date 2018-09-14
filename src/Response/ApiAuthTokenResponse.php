<?php

namespace Sctr\Greenrope\Api\Response;

use JMS\Serializer\Annotation as Serializer;

class ApiAuthTokenResponse
{
    use ApiResponse;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Token")
     */
    private $token;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}