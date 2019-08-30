<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Tests;

use Sctr\Greenrope\Api\ApiResponse;

class GroupEndpointTest extends BaseTest
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testCreateGroup()
    {
        $groupParameters = [
            'name'  => 'Test group',
            'type'  => 'Public',
        ];

        $response = $this->client->group->create($groupParameters);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testCreateExistingGroup()
    {
        $groupParameters = [
            'name'  => 'Test group',
            'type'  => 'Public',
        ];

        // Second create  with same parameters as previous test (for simultaneous test run)- throws exception
        $response = $this->client->group->create($groupParameters);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertTrue(!empty($response->getException()));
    }

    public function testGetGroups()
    {
        $response = $this->client->group->getGroups();

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertTrue(is_array($response->getResult()));
        $this->assertTrue(count($response->getResult()) >= 1);
    }

    public function testEditGroups()
    {
        $parametersGroup1 = [
            'query' => ['group_name' => 'Test group'],
            'name'  => 'Test group Edited',
        ];

        $response = $this->client->group->editGroups(['groups' => [$parametersGroup1]]);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testDeleteGroups()
    {
        $groupsArray = [
            'groups' => [
                ['query' => ['group_name' => 'Test group Edited']],
            ],
        ];

        $response = $this->client->group->deleteGroups($groupsArray);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
