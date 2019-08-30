<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Endpoint;

use Sctr\Greenrope\Api\ApiResponse;

class CrmActivityEndpoint extends AbstractEndpoint
{
    /**
     * @param array $searchParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getCrmActivities(array $searchParameters = [])
    {
        return $this->handleRequest('CrmActivity', 'Get', $searchParameters);
    }

    /**
     * @param array $activitiesData
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function addCrmActivities(array $activitiesData = [])
    {
        return $this->handleRequest('CrmActivity', 'Add', $activitiesData);
    }

    /**
     * @param array $activitiesData
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function editCrmActivities(array $activitiesData = [])
    {
        return $this->handleRequest('CrmActivity', 'Edit', $activitiesData);
    }

    /**
     * @param array $activitiesData
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function deleteCrmActivities(array $activitiesData = [])
    {
        return $this->handleRequest('CrmActivity', 'Delete', $activitiesData);
    }

    /**
     * @param array $searchParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getCrmActivitiesEmails(array $searchParameters)
    {
        return $this->handleRequest('CrmActivity', 'Get', $searchParameters, true, 'Emails');
    }

    /**
     * @param array $searchParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getCrmActivitiesWebsiteVisits(array $searchParameters)
    {
        return $this->handleRequest('CrmActivity', 'Get', $searchParameters, true, 'WebsiteVisits');
    }

    /**
     * @param array $searchParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getAllCrmActivitiesEmails(array $searchParameters = [])
    {
        return $this->handleRequest('CrmActivity', 'GetAll', $searchParameters, true, 'Emails');
    }

    /**
     * @param array $searchParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getAllCrmActivitiesWebsiteVisits(array $searchParameters = [])
    {
        return $this->handleRequest('CrmActivity', 'GetAll', $searchParameters, true, 'WebsiteVisits');
    }

    /**
     * @param array $searchParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getCrmActivityTypes(array $searchParameters = [])
    {
        return $this->handleRequest('CrmActivity', 'Get', $searchParameters, false, 'Types');
    }

    /**
     * @param array $searchParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getCrmAsignables(array $searchParameters = [])
    {
        return $this->handleRequest('CrmActivity', 'Get', $searchParameters, false, 'Assignables');
    }
}
