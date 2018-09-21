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

namespace Sctr\Greenrope\Api\Service;

use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;

class CamelCaseNamingStrategy implements PropertyNamingStrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function translateName(PropertyMetadata $property)
    {
        return ucfirst($property->name);
    }
}
