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
    CONST CODE_CUSTOMER_ALREADY_EXISTS = 1002;

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
            throw new \Exception('Error adding customer to greenrope: '.$contact->getErrorText(), $contact->getErrorCode());
        }

        return $contact;
    }

    /**
     * Adds a contact, and if it is existing makes an update based on the email if sent in the $contactData array
     *
     * @param array $contactData
     * @param array $groups
     * @param bool  $groupsReplace
     *
     * @throws \Exception
     *
     * @return Contact
     */
    public function addUpdateContact(array $contactData, array $groups = [], bool $groupsReplace = true)
    {
        if (!empty($groups)) {
            foreach ($groups as $group) {
                $contactData['groups'][] = [
                    'value' => $group
                ];
            }
        }

        try {
            return $this->addContact($contactData);
        } catch (\Exception $e) {
            if ($e->getCode() === self::CODE_CUSTOMER_ALREADY_EXISTS && !empty($contactData['email'])) {
                $contactData['query'] = ['email' => $contactData['email']];
                if ($groupsReplace) {
                    $contactData['groups']['replace'] = true;
                }

                return $this->editContact($contactData);
            }

            throw $e;
        }
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
     * @param array $contactData
     *
     * @throws \Exception
     *
     * @return Contact
     */
    public function editContact(array $contactData)
    {
        $response = $this->handleRequest('Contact', 'Edit', ['contacts' => [$contactData]]);

        if ($response->getException()) {
            throw new \Exception($response->getException()->getMessage());
        }

        $contact = $response->getResult()[0];

        if ($contact->getErrorCode()) {
            throw new \Exception('Error editing customer on greenrope: '.$contact->getErrorText());
        }

        return $contact;
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
    public function getContactGroupsRequest(array $searchCriteria)
    {
        return $this->handleRequest('Contact', 'Get', ['query' => $searchCriteria], false, 'Groups');
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
     * @param int   $groupId
     * @param array $contactSearchCriteria
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function addContactToGroup(int $groupId, array $contactSearchCriteria)
    {
        $parameters = [
            'query'    => ['group_id' => $groupId],
            'contacts' => [
                ['query' => $contactSearchCriteria],
            ],
        ];

        $response = $this->handleRequest('Contact', 'Add', $parameters, true, 'ToGroup');

        if ($response->getException()) {
            throw new \Exception($response->getException()->getMessage());
        }

        $contact = $response->getResult()[0];

        if ($contact->getErrorCode()) {
            throw new \Exception('Error adding contact to greenrope group: '.$contact->getErrorText());
        }

        return true;
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

    /**
     * @param int   $groupId
     * @param array $contactSearchCriteria
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function deleteContactFromGroup(int $groupId, array $contactSearchCriteria)
    {
        $parameters = [
            'query'    => ['group_id' => $groupId],
            'contacts' => [
                ['query' => $contactSearchCriteria],
            ],
        ];

        $response = $this->handleRequest('Contact', 'Delete', $parameters, true, 'FromGroup');

        if ($response->getException()) {
            throw new \Exception($response->getException()->getMessage());
        }

        $contact = $response->getResult()[0];

        if ($contact->getErrorCode()) {
            throw new \Exception('Error deleting customer from greenrope group: '.$contact->getErrorText());
        }

        return true;
    }

    /**
     * @param string $groupName
     * @param array  $contactSearchCriteria
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function deleteContactFromGroupByGroupName(string $groupName, array $contactSearchCriteria)
    {
        $parameters = [
            'query'    => ['group_name' => $groupName],
            'contacts' => [
                ['query' => $contactSearchCriteria],
            ],
        ];

        $response = $this->handleRequest('Contact', 'Delete', $parameters, true, 'FromGroup');

        if ($response->getException()) {
            throw new \Exception($response->getException()->getMessage());
        }

        $contact = $response->getResult()[0];

        if ($contact->getErrorCode()) {
            throw new \Exception('Error deleting customer from greenrope group: '.$contact->getErrorText());
        }

        return true;
    }
}
