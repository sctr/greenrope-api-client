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

class GroupEndpointTest extends BaseTest
{
    public function testCreateGroup()
    {
        $groupParameters = [
            'query' => ['account_id' => 45429],
            'name'  => 'Test group 2',
            'type'  => 'Hidden',
        ];

        $response = $this->client->group->create($groupParameters);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessageRegExp "Error while creating group.*"
     */
    public function testCreateExistingGroup()
    {
        $name = $this->faker->name;

        $groupParameters = [
            'query' => ['account_id' => 45429],
            'name'  => $name,
            'type'  => 'Hidden',
        ];

        // Successful create
        $this->client->group->create($groupParameters);

        // Second create with same parameters - throws exception
        $this->client->group->create($groupParameters);
    }

    public function testGetGroups()
    {
        $groupParameters = [
            'query' => ['account_id' => 45429]
        ];

        $response = $this->client->group->getGroups($groupParameters);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testEditGroups()
    {
        $parametersGroup1 = [
            'query' => ['group_id' => 19, 'account_id' => 45429],
            'name' => 'Test group Edited'
        ];

        $response = $this->client->group->editGroups(['groups' => [$parametersGroup1]]);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testDeleteGroups()
    {
        $groupsArray = [
            'groups' => [
                ['query' => ['group_name' => "Test group", 'account_id' => 45429]],
                ['query' => ['group_name' => "Test group 2", 'account_id' => 45429]]
            ]
        ];

        $response = $this->client->group->deleteGroups($groupsArray);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
