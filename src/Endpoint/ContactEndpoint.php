<?php

namespace Sctr\Greenrope\Api\Endpoint;

use Sctr\Greenrope\Api\ApiResponse;

class ContactEndpoint extends AbstractEndpoint
{
    /**
     * @param array $contacts - an array containing arrays of contact data
     *
     * @return ApiResponse
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
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function getContacts(array $searchAttributes = [])
    {
        return $this->handleRequest('Contact', 'Get', $searchAttributes);
    }

    /**
     * @param array $contacts
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function editContacts(array $contacts)
    {
        return $this->handleRequest('Contact', 'Edit', $contacts);
    }

    /**
     * @param array $contacts
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function deleteContacts(array $contacts)
    {
        return $this->handleRequest('Contact', 'Delete', $contacts);
    }

    /**
     * @param array $contacts
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function unsubscribeContacts(array $contacts)
    {
        return $this->handleRequest('Contact', 'Unsubscribe', $contacts);
    }

    /**
     * @param $contactId
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function getContactGroupsRequest($contactId)
    {
        return $this->handleRequest('ContactGroup', 'Get', ['contact_id' => $contactId, 'account_id' => 45429]);
    }

    /**
     * @param array $searchContacts
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function searchContacts(array $searchContacts)
    {
        return $this->handleRequest('Contact', 'Search', $searchContacts);
    }

    /**
     * @param array $contacts
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function getUserDefinedFields(array $parameters)
    {
        return $this->handleRequest('UserDefinedField', 'Get', $parameters);
    }

    /**
     * @param array $newFieldParameters
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function addUserDefinedField(array $newFieldParameters)
    {
        return $this->handleRequest('UserDefinedField', 'Add', $newFieldParameters, false);
    }

    /**
     * @param array $editFieldParameters
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function editUserDefinedField(array $editFieldParameters)
    {
        return $this->handleRequest('UserDefinedField', 'Edit', $editFieldParameters, false);
    }

    /**
     * @param array $editFieldParameters
     *
     * @return ApiResponse
     * @throws \Exception
     */
    public function deleteUserDefinedField(array $editFieldParameters)
    {
        return $this->handleRequest('UserDefinedField', 'Delete', $editFieldParameters, false);
    }
}
