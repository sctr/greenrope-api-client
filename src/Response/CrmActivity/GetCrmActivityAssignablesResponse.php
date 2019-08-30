<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Response\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetCRMAssignablesResponse")
 */
class GetCrmActivityAssignablesResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Contact>")
     * @Serializer\SerializedName("AssignableContacts")
     * @Serializer\XmlList(entry="AssignableContact")
     */
    protected $contacts;

    public function getResult()
    {
        return $this->contacts;
    }
}
