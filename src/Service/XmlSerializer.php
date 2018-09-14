<?php

namespace Sctr\Greenrope\Api\Service;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

class XmlSerializer
{
    /** @var Serializer */
    private $serializer;

    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    public function deserializeXml($xmlData, $class)
    {
        return $this->serializer->deserialize($xmlData, $class, 'xml');
    }

    public function serializeObjectToXml($object)
    {
        $result = $this->serializer->serialize($object, 'xml');

        $result = str_replace("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n", "", $result);

        return $result;
    }
}