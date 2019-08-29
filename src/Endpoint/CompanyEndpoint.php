<?php

namespace Sctr\Greenrope\Api\Endpoint;

use Sctr\Greenrope\Api\ApiResponse;

class CompanyEndpoint extends AbstractEndpoint
{
    /**
     * Searches companies by the provided attributes.
     *
     * @param int $groupId
     * @param array $searchAttributes
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function getCompanies(int $groupId, array $searchAttributes = [])
    {
        $searchAttributes['query']['group_id'] = $groupId;
        return $this->handleRequest('Company', 'Get', $searchAttributes);
    }
}
