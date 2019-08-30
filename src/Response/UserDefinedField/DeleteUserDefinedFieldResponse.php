<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\UserDefinedField;

use Sctr\Greenrope\Api\Response\GreenropeResponse;

class DeleteUserDefinedFieldResponse extends GreenropeResponse
{
    public function getResult()
    {
        return $this->getSuccess();
    }
}
