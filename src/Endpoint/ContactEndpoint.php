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

class ContactEndpoint extends AbstractEndpoint
{
    /**
     * @param array $contacts - an array containing arrays of contact data
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function addContacts(array $contacts)
    {
        return $this->handleRequest('Contact', 'Add', $contacts);
    }

    /**
     * Searches contacts by the provided attributes.
     *
     * @param array $searchAttributes
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getContacts(array $searchAttributes = [])
    {
        return $this->handleRequest('Contact', 'Get', $searchAttributes);
    }

    /**
     * @param array $contacts
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function editContacts(array $contacts)
    {
        return $this->handleRequest('Contact', 'Edit', $contacts);
    }

    /**
     * @param array $contacts
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function deleteContacts(array $contacts)
    {
        return $this->handleRequest('Contact', 'Delete', $contacts);
    }

    /**
     * @param array $contacts
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function unsubscribeContacts(array $contacts)
    {
        return $this->handleRequest('Contact', 'Unsubscribe', $contacts);
    }

    /**
     * @param $contactId
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getContactGroupsRequest($contactId)
    {
        return $this->handleRequest('ContactGroup', 'Get', ['contact_id' => $contactId, 'account_id' => 45429]);
    }

    /**
     * @param array $searchContacts
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function searchContacts(array $searchContacts)
    {
        return $this->handleRequest('Contact', 'Search', $searchContacts);
    }

    /**
     * @param array $contacts
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function getUserDefinedFields(array $parameters)
    {
        return $this->handleRequest('UserDefinedField', 'Get', $parameters);
    }

    /**
     * @param array $newFieldParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function addUserDefinedField(array $newFieldParameters)
    {
        return $this->handleRequest('UserDefinedField', 'Add', $newFieldParameters, false);
    }

    /**
     * @param array $editFieldParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function editUserDefinedField(array $editFieldParameters)
    {
        return $this->handleRequest('UserDefinedField', 'Edit', $editFieldParameters, false);
    }

    /**
     * @param array $editFieldParameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function deleteUserDefinedField(array $editFieldParameters)
    {
        return $this->handleRequest('UserDefinedField', 'Delete', $editFieldParameters, false);
    }

    /**
     * @param array $parameters
     *
     * @return ApiResponse
     *
     * @throws \Exception
     */
    public function addContactsToGroup(array $parameters)
    {
        return $this->handleRequest('Contact', 'Add', $parameters, true, 'ToGroup');
    }

    /**
     * @param array $parameters
     *
     * @return ApiResponse
     *
     * @throws \Exception
     */
    public function deleteContactsFromGroup(array $parameters)
    {
        return $this->handleRequest('Contact', 'Delete', $parameters, true, 'FromGroup');
    }
}
