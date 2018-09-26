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

namespace Sctr\Greenrope\Api\Request;

use Doctrine\Common\Annotations\AnnotationReader;
use JMS\Serializer\Metadata\Driver\AnnotationDriver;
use Metadata\MetadataFactory;

abstract class GreenropeRequest
{
    public function __construct(array $content = [])
    {
        $metadataFactory = new MetadataFactory(new AnnotationDriver(new AnnotationReader()));
        $metadata        = $metadataFactory->getMetadataForClass(get_class($this));

        foreach ($content as $key => $value) {
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (property_exists($this, $key)) {
                if ($key === 'query') {
                    foreach ($value as $queryKey => $queryParameter) {
                        if (array_search($queryKey, $this::ALLOWED_QUERY_PARAMS, true) === false) {
                            throw new \Exception('Invalid query parameter sent.');
                        }
                    }
                }

                $keyMetadata = $metadata->propertyMetadata[$key];
                if ($keyMetadata->xmlCollection === true
                    && $keyMetadata->type['name'] === 'array'
                    && !empty($keyMetadata->type['params'])
                    && is_array($value)
                ) {
                    $class = 'Sctr\\Greenrope\\Api\\Model\\'.$metadata->propertyMetadata[$key]->xmlEntryName;
                    foreach ($value as $newClassParams) {
                        $newObject      = new $class($newClassParams);
                        $this->{$key}[] = $newObject;
                    }
                } elseif (strpos($keyMetadata->type['name'], 'Sctr\Greenrope\Api\Model\\') !== false) {
                    $this->{$key} = new $keyMetadata->type['name']($value);
                } else {
                    $this->{$key} = $value;
                }
            }
        }
    }
}
