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

    /**
     * Gets company contacts, filtered to a group and/or company
     *
     * @param int $groupId
     * @param int|null $companyId
     * @return ApiResponse
     * @throws \Exception
     */
    public function getCompanyContacts(int $groupId, int $companyId)
    {
        return $this->handleRequest('Contact', 'GetCompany',
            ['query' => ['group_id' => $groupId, 'company_id' => $companyId]], true);
    }
}
