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
use Sctr\Greenrope\Api\Request\GreenropeRequest;

/**
 * @Serializer\XmlRoot("SearchContactsRequest")
 */
class SearchContactsRequest extends GreenropeRequest
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
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Rule>")
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
}
