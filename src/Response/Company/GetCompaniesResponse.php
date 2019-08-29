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

namespace Sctr\Greenrope\Api\Response\Company;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetCompaniesResponse")
 */
class GetCompaniesResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\Company>")
     * @Serializer\SerializedName("Companies")
     * @Serializer\XmlList(entry="Company")
     */
    protected $companies;

    public function getResult()
    {
        if ($this->getSuccess()) {
            return [
                'Companies' => $this->companies,
            ];
        }
    }
}
