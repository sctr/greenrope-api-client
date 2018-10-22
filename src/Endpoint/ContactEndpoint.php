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
use Sctr\Greenrope\Api\Model\Contact;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

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
     * @param array $contactData
     *
     * @throws \Exception
     *
     * @return Contact
     */
    public function addContact(array $contactData)
    {
        $response = $this->handleRequest('Contact', 'Add', ['contacts' => [$contactData]]);

        if ($response->getException()) {
            throw new \Exception($response->getException()->getMessage());
        }

        $contact = $response->getResult()[0];

        if ($contact->getErrorCode()) {
            throw new \Exception('Error adding customer to greenrope: '.$contact->getErrorText());
        }

        return $contact;
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
     * @param $email
     *
     * @throws \Exception
     *
     * @return Contact|null
     */
    public function getContactByEmail($email)
    {
        $searchAttributes = [
            'query' => ['email' => $email],
        ];

        /** @var ApiResponse $response */
        $response = $this->handleRequest('Contact', 'Get', $searchAttributes);

        if ($response->getException()) {
            throw new \Exception($response->getException()->getMessage());
        }

        if ($response->getResult() && $response->getResult()['total'] === 1) {
            return $response->getResult()['contacts'][0];
        }
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
        return $this->handleRequest('Contact', 'Get', ['contact_id' => $contactId], false, 'Groups');
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
    public function getUserDefinedFields(array $parameters = [])
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

    public function addUserDefinedFieldToContact(Contact $contact, string $fieldName, string $fieldValue)
    {
        $editData = [
            'contacts' => [
                [
                    'query'             => ['contact_id' => $contact->getId()],
                    'userDefinedFields' => [
                        ['query' => ['fieldname' => $fieldName], 'value' => $fieldValue],
                    ],
                ],
            ],
        ];

        $response = $this->handleRequest('Contact', 'Edit', $editData);

        if ($response->getException()) {
            throw new \Exception($response->getException()->getMessage());
        }

        return $response->getResult()[0]->getSuccess() === GreenropeResponse::SUCCESS_RESPONSE;
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
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function addContactsToGroup(array $parameters)
    {
        return $this->handleRequest('Contact', 'Add', $parameters, true, 'ToGroup');
    }

    /**
     * @param array $parameters
     *
     * @throws \Exception
     *
     * @return ApiResponse
     */
    public function deleteContactsFromGroup(array $parameters)
    {
        return $this->handleRequest('Contact', 'Delete', $parameters, true, 'FromGroup');
    }
}
