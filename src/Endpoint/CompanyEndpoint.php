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

class CompanyEndpoint extends AbstractEndpoint
{
    /**
     * Searches companies by the provided attributes.
     *
     * @param int   $groupId
     * @param array $searchAttributes
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getCompanies(int $groupId, array $searchAttributes = [])
    {
        $searchAttributes['query']['group_id'] = $groupId;

        return $this->handleRequest('Company', 'Get', $searchAttributes);
    }

    /**
     * Gets company contacts, filtered to a group and/or company.
     *
     * @param int      $groupId
     * @param int|null $companyId
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getCompanyContacts(int $groupId, int $companyId)
    {
        return $this->handleRequest('Contact', 'GetCompany',
            ['query' => ['group_id' => $groupId, 'company_id' => $companyId]], true);
    }
}
