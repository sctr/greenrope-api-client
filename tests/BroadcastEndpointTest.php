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

class BroadcastEndpointTest extends BaseTest
{
    public function testGetBroadcasts()
    {
        $searchParameters = [
            'query' => [
                'account_id' => 45429,
            ],
        ];

        $response = $this->client->broadcast->getBroadcasts($searchParameters);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGetBroadcastStats()
    {
        $searchParameters = [
            'query' => [
                'account_id'   => 45429,
                'broadcast_id' => '996',
                'message_type' => 'personal_email',
            ],
        ];

        $response = $this->client->broadcast->getBroadcastStats($searchParameters);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
