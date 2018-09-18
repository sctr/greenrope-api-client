<?php

namespace Sctr\Greenrope\Api\Endpoint;

use Sctr\Greenrope\Api\ApiResponse;

class ContactEndpoint extends AbstractEndpoint
{
    /**
     * @param array $contacts - an array containing arrays of contact data
     * @return ApiResponse
     *
     * @throws \Exception
     */
    public function addContacts(array $contacts)
    {
        return $this->handleRequest('Contact', 'Add', $contacts);
    }

    /**
     * Searches contacts by the provided attributes
     *
     * @param array $searchAttributes
     * @return ApiResponse
     *
     * @throws \Exception
     */
    public function getContacts(array $searchAttributes = [])
    {
        return $this->handleRequest('Contact', 'Get', $searchAttributes);
    }

    /**
     * @param array $contacts
     * @return ApiResponse
     *
     * @throws \Exception
     */
    public function editContacts(array $contacts)
    {
        return $this->handleRequest('Contact', 'Edit', $contacts);
    }

    /**
     * @param array $contacts
     * @return ApiResponse
     *
     * @throws \Exception
     */
    public function deleteContacts(array $contacts)
    {
        return $this->handleRequest('Contact', 'Delete', $contacts);
    }
}
