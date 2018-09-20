<?php

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
        if ($this->getErrorCode()) {
            return null;
        }

        return $this->userDefinedFields;
    }
}
