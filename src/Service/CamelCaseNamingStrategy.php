<?php

namespace Sctr\Greenrope\Api\Service;

use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;

class CamelCaseNamingStrategy implements PropertyNamingStrategyInterface
{
    /**
     * @inheritdoc
     */
    public function translateName(PropertyMetadata $property)
    {
        return ucfirst($property->name);
    }
}
