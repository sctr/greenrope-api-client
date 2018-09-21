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

namespace Sctr\Greenrope\Api\Endpoint;

use Sctr\Greenrope\Api\ApiResponse;

class GroupEndpoint extends AbstractEndpoint
{
    /**
     * @param array $parameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function create(array $parameters)
    {
        return $this->handleRequest('Group', 'Create', $parameters, false);
    }

    /**
     * @param array $searchAttributes
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getGroups(array $searchAttributes)
    {
        return $this->handleRequest('Group', 'Get', $searchAttributes);
    }
}
