<?php

namespace Sctr\Greenrope\Api\Response\UserDefinedField;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("EditUserDefinedFieldResponse")
 */
class EditUserDefinedFieldResponse extends GreenropeResponse
{
    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("UserFieldID")
     */
    protected $userFieldId;

    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("integer")
     */
    protected $accountNumber;

    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    protected $updatedTimeStamp;

    public function getResult()
    {
        if ($this->getErrorCode()) {
            return null;
        }

        return [
            'success' => $this->getSuccess(),
            'userFieldId' => $this->userFieldId,
            'accountNumber' => $this->accountNumber,
            'updatedTimeStamp' => $this->updatedTimeStamp
        ];
    }
}
