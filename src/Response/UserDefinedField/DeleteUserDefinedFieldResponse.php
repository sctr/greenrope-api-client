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

namespace Sctr\Greenrope\Api\Response\UserDefinedField;

use Sctr\Greenrope\Api\Response\GreenropeResponse;

class DeleteUserDefinedFieldResponse extends GreenropeResponse
{
    public function getResult()
    {
        return $this->getSuccess();
    }
}
