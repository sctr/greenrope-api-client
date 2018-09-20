<?php

namespace Sctr\Greenrope\Api\Tests;

use Sctr\Greenrope\Api\Model\Group;

class GroupEndpointTest extends BaseTest
{
    public function testCreateGroup()
    {
        $groupParameters = [
            'query' => ['account_id' => 45429],
            'name' => $this->faker->name,
            'type' => 'Hidden'
        ];

        $response = $this->client->group->create($groupParameters);
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
            'name' => $name,
            'type' => 'Hidden'
        ];

        // Successful create
        $this->client->group->create($groupParameters);

        // Second create with same parameters - throws exception
        $this->client->group->create($groupParameters);
    }

    public function testGetGroups()
    {
        $groupParameters = [
            'account_id' => 45429,
            'group_id' => 14
        ];

        $response = $this->client->group->getGroups($groupParameters);
    }
}
