<?php

namespace Sctr\Greenrope\Api\Model;

use Doctrine\Common\Annotations\AnnotationReader;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Metadata\Driver\AnnotationDriver;
use Metadata\MetadataFactory;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

abstract class AbstractModel
{
    /**
     * @Serializer\Type("array")
     * @Serializer\XmlAttributeMap()
     */
    protected $query;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Result")
     */
    protected $success;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ErrorCode")
     */
    protected $errorCode;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ErrorText")
     */
    protected $errorText;

    /**
     * AbstractModel constructor.
     *
     * @param array $content
     *
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function __construct(array $content = [])
    {
        $metadataFactory = new MetadataFactory(new AnnotationDriver(new AnnotationReader()));
        $metadata = $metadataFactory->getMetadataForClass(get_class($this));

        foreach ($content as $key => $value) {
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (property_exists($this, $key)) {
                if ($metadata->propertyMetadata[$key]->xmlCollection === true && is_array($value)) {
                    $class = 'Sctr\\Greenrope\\Api\\Model\\' . $metadata->propertyMetadata[$key]->xmlEntryName;
                    foreach ($value as $newClassParams) {
                        $newObject = new $class($newClassParams);
                        $this->{$key}[] = $newObject;
                    }
                } else {
                    $this->{$key} = $value;
                }
            }
        }
    }

    /**
     * @param string     $name
     * @param array|null $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments = null)
    {
        if (strpos($name, 'get') === 0) {
            $key = lcfirst(str_replace('get', '', $name));
            if ($key === '' && isset($arguments[0])) {
                $key = $arguments[0];
            }

            if (property_exists($this, $key)) {
                return $this->$key;
            }
        }

        if (strpos($name, 'set') === 0) {
            $key = lcfirst(str_replace('set', '', $name));
            if (property_exists($this, $key)) {
                return $this->$key = $arguments[0];
            }
        }

        if (strpos($name, 'add') === 0) {
            $key = lcfirst(str_replace('add', '', $name)) . 's';
            if (property_exists($this, $key)) {
                return $this->$key[] = $arguments[0];
            }
        }

        throw new \BadMethodCallException('Method does not exist: '.$name);
    }

    /**
     * @return string
     */
    public function getSuccess()
    {
        return $this->success === GreenropeResponse::SUCCESSFUL_RESPONSE ? true : false;
    }
}