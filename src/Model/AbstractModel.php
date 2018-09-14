<?php

namespace Sctr\Greenrope\Api\Model;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractModel
{
    /**
     * @Serializer\Type("array")
     * @Serializer\XmlAttributeMap()
     */
    protected $query;

    /**
     * AbstractModel constructor.
     *
     * @param array $content
     */
    public function __construct(array $content = [])
    {
        foreach ($content as $key => $value) {
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
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
}