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

namespace Sctr\Greenrope\Api\Tests;

use Sctr\Greenrope\Api\ApiResponse;

class CrmActivitiesEndpointTest extends BaseTest
{
    public function testGetCrmActivities()
    {
        $searchQuery = [
            'query' => ['get_all' => true],
        ];

        $response = $this->client->crmActivity->getCrmActivities($searchQuery);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testAddCrmActivities()
    {
        $activitiesData = [
            'crmActivities' => [
                ['contactId' => 43, 'groupId' => 1, 'activity' => 'Test'],
            ],
        ];

        $response = $this->client->crmActivity->addCrmActivities($activitiesData);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testEditCrmActivities()
    {
        $activitiesData = [
            'crmActivities' => [
                ['query' => ['activity_id' => 3], 'activity' => 'Test edited'],
            ],
        ];

        $response = $this->client->crmActivity->editCrmActivities($activitiesData);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testDeleteCrmActivities()
    {
        $activitiesData = [
            'crmActivities' => [
                ['query' => ['activity_id' => 3]],
            ],
        ];

        $response = $this->client->crmActivity->deleteCrmActivities($activitiesData);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGetCrmActivitiesEmails()
    {
        $searchQuery = [
            'query' => ['contact_id' => 10],
        ];

        $response = $this->client->crmActivity->getCrmActivitiesEmails($searchQuery);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGetCrmActivitiesWebsiteVisits()
    {
        $searchQuery = [
            'query' => ['contact_id' => 4],
        ];

        $response = $this->client->crmActivity->getCrmActivitiesWebsiteVisits($searchQuery);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGetAllCrmActivitiesEmails()
    {
        $searchQuery = [
            'contacts' => [4, 5],
        ];

        $response = $this->client->crmActivity->getAllCrmActivitiesEmails($searchQuery);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGetAllCrmActivitiesWebsiteVisits()
    {
        $response = $this->client->crmActivity->getAllCrmActivitiesWebsiteVisits();

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGetCrmActivityTypes()
    {
        $response = $this->client->crmActivity->getCrmActivityTypes();

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGetCrmAsignables()
    {
        $searchQuery = [
            'query' => ['contact_id' => 10],
        ];

        $response = $this->client->crmActivity->getCrmAsignables($searchQuery);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
