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
use Sctr\Greenrope\Api\Model\Group;

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
    public function getGroups(array $searchAttributes = [])
    {
        return $this->handleRequest('Group', 'Get', $searchAttributes);
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Group
     */
    public function getGroupById(int $id)
    {
        $searchAttributes = [
            'query' => ['group_id' => $id]
        ];

        $response = $this->handleRequest('Group', 'Get', $searchAttributes);

        if ($response->getException()) {
            throw new \Exception($response->getException()->getMessage());
        }

        return $response->getResult()[0];
    }

    /**
     * @param array $parameters
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function editGroups(array $parameters)
    {
        return $this->handleRequest('Group', 'Edit', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @throws \Exception
     *
     * @return mixed
     */
    public function deleteGroups(array $parameters)
    {
        return $this->handleRequest('Group', 'Delete', $parameters);
    }
}
