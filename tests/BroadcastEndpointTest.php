<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Tests;

use Sctr\Greenrope\Api\ApiResponse;

class BroadcastEndpointTest extends BaseTest
{
    public function testGetBroadcasts()
    {
        $searchParameters = [
            'query' => [
                'Group_id' => 2,
            ],
        ];

        $response = $this->client->broadcast->getBroadcasts($searchParameters);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGetBroadcastStats()
    {
        $searchParameters = [
            'query' => [
                'broadcast_id' => '996',
                'message_type' => 'personal_email',
            ],
        ];

        $response = $this->client->broadcast->getBroadcastStats($searchParameters);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
