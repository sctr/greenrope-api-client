<?php

namespace Sctr\Greenrope\Api\Endpoint;

use Sctr\Greenrope\Api\ApiResponse;

class GroupEndpoint extends AbstractEndpoint
{
    /**
     * @param array $parameters
     * @return ApiResponse
     *
     * @throws \Exception
     */
    public function create(array $parameters)
    {
        return $this->handleRequest('Group', 'Create', $parameters);
    }

    /**
     * @param array $searchAttributes
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function getGroups(array $searchAttributes)
    {
        return $this->handleRequest('Group', 'Get', $searchAttributes);
    }
}
