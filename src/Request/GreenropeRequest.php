<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Request;

use Doctrine\Common\Annotations\AnnotationReader;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Metadata\Driver\AnnotationDriver;
use Metadata\MetadataFactory;

abstract class GreenropeRequest
{
    /**
     * @Serializer\XmlAttribute()
     * @Serializer\SerializedName("account_id")
     */
    protected $accountId;

    public function __construct(array $content = [])
    {
        $this->accountId = $content['accountId'];

        $metadataFactory = new MetadataFactory(new AnnotationDriver(new AnnotationReader()));
        $metadata        = $metadataFactory->getMetadataForClass(get_class($this));

        foreach ($content as $key => $value) {
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (property_exists($this, $key)) {
                if ($key === 'query') {
                    foreach ($value as $queryKey => $queryParameter) {
                        if (array_search($queryKey, $this::ALLOWED_QUERY_PARAMS, true) === false) {
                            throw new \Exception(sprintf(
                                'Invalid query parameter sent. Allowed query values: %s',
                                implode(', ', $this::ALLOWED_QUERY_PARAMS)
                            ));
                        }
                    }
                }

                $keyMetadata = $metadata->propertyMetadata[$key];
                if ($keyMetadata->xmlCollection === true
                    && $keyMetadata->type['name'] === 'array'
                    && !empty($keyMetadata->type['params'])
                    && strpos($keyMetadata->type['params'][0]['name'], 'Sctr\Greenrope\Api\Model\\') !== false
                    && is_array($value)
                ) {
                    $class = $keyMetadata->type['params'][0]['name'];
                    foreach ($value as $newClassParams) {
                        $newObject      = new $class(array_merge(['accountId' => $this->accountId], $newClassParams));
                        $this->{$key}[] = $newObject;
                    }
                } elseif (strpos($keyMetadata->type['name'], 'Sctr\Greenrope\Api\Model\\') !== false) {
                    $this->{$key} = new $keyMetadata->type['name'](array_merge(['accountId' => $this->accountId], $value));
                } else {
                    $this->{$key} = $value;
                }
            }
        }
    }
}
