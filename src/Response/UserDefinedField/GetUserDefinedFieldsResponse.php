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

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetUserDefinedFieldsResponse")
 */
class GetUserDefinedFieldsResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\UserDefinedField>")
     * @Serializer\SerializedName("UserDefinedFields")
     * @Serializer\XmlList(entry="UserDefinedField")
     */
    protected $userDefinedFields;

    public function getResult()
    {
        return $this->userDefinedFields;
    }
}
