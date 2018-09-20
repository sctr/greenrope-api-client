<?php

namespace Sctr\Greenrope\Api\Response\UserDefinedField;

use Sctr\Greenrope\Api\Response\GreenropeResponse;

class DeleteUserDefinedFieldResponse extends GreenropeResponse
{
    public function getResult()
    {
        if ($this->getErrorCode()) {
            return null;
        }

        return $this->getSuccess();
    }
}
