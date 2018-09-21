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

namespace Sctr\Greenrope\Api\Request\Contact;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Model\Group;
use Sctr\Greenrope\Api\Model\Rule;
use Sctr\Greenrope\Api\Model\SearchContactIncludes;

/**
 * @Serializer\XmlRoot("SearchContactsRequest")
 */
class SearchContactsRequest
{
    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $from;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $filter;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $orderBy;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $orderDirection;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     */
    protected $page;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlList(entry="Rule", skipWhenEmpty=true)
     */
    protected $rules;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("Sctr\Greenrope\Api\Model\SearchContactIncludes")
     */
    protected $includes;

    /**
     * @Serializer\XmlList(entry="Group")
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Group>")
     */
    protected $groups;

    public function __construct(array $content = [])
    {
        foreach ($content as $key => $value) {
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (property_exists($this, $key)) {
                if ($key === 'includes') {
                    $includes     = new SearchContactIncludes($value);
                    $this->{$key} = $includes;
                } elseif ($key === 'rules') {
                    foreach ($value as $ruleParams) {
                        $rule           = new Rule($ruleParams);
                        $this->{$key}[] = $rule;
                    }
                } elseif ($key === 'groups') {
                    foreach ($value as $groupParams) {
                        $group          = new Group($groupParams);
                        $this->{$key}[] = $group;
                    }
                } else {
                    $this->{$key} = $value;
                }
            }
        }
    }
}
