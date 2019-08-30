<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Endpoint;

use Sctr\Greenrope\Api\ApiResponse;

class BroadcastEndpoint extends AbstractEndpoint
{
    /**
     * @param array $searchParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getBroadcasts(array $searchParameters = [])
    {
        return $this->handleRequest('Broadcast', 'Get', $searchParameters);
    }

    /**
     * @param array $searchParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getBroadcastStats(array $searchParameters)
    {
        return $this->handleRequest('Broadcast', 'Get', $searchParameters, false, 'Stats');
    }

    /**
     * @param array $searchParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getBroadcastBody(array $searchParameters)
    {
        return $this->handleRequest('Broadcast', 'Get', $searchParameters, false, 'Body');
    }

    /**
     * @param array $mailData
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function queueMail(array $mailData)
    {
        return $this->handleRequest('Mail', 'Queue', $mailData, false);
    }

    /**
     * @param array $mailData
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function sendTestMail(array $mailData)
    {
        return $this->handleRequest('Mail', 'SendTest', $mailData, false);
    }
}
