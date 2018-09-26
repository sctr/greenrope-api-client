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
use Sctr\Greenrope\Api\Model\Contact;

class ContactEndpointTest extends BaseTest
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testAddContactsRequest()
    {
        $contact1 = [
            'query'             => ['account_id' => 45429],
            'firstName'         => 'Test',
            'lastName'          => 'Test',
            'email'             => 'testEmail@test.com',
            'groups'            => [
                ['id' => 16, 'name' => 'Test group'],
            ],
            'userDefinedFields' => [
                ['query' => ['fieldname' => 'first value fieldname'], 'value' => 'First value'],
                ['query' => ['fieldname' => 'second value fieldname'], 'value' => 'Second value'],
            ],
        ];

        /** @var ApiResponse $response */
        $response = $this->client->contact->addContacts(['contacts' => [$contact1]]);

        $this->assertTrue(is_array($response->getResult()));

        $this->assertInstanceOf(Contact::class, $response->getResult()[0]);
    }

    public function testGetContacts()
    {
        $searchAttributes = [
            'query' => ['account_id' => 45429],
        ];

        /** @var ApiResponse $response */
        $response = $this->client->contact->getContacts($searchAttributes);

        $this->assertTrue(is_array($response->getResult()));
        $this->assertTrue($response->getResult()['total'] > 0);
        $this->assertTrue(count($response->getResult()['contacts']) === $response->getResult()['total']);
    }

    public function testEditContacts()
    {
        $editContact1 = [
            'query'     => [
                'account_id' => 45429,
                'contact_id' => 27,
            ],
            'firstName' => 'Test Edited',
            'lastName'  => 'Test Edited',
        ];

        $response = $this->client->contact->editContacts([$editContact1]);

        $this->assertTrue(is_array($response->getResult()));
        $this->assertInstanceOf(Contact::class, $response->getResult()[0]);
        $this->assertTrue($response->getResult()[0]->getSuccess());
    }

    public function testDeleteContacts()
    {
        $contact1 = ['query' => ['contact_id' => 30, 'account_id' => 45429]];

        $response = $this->client->contact->unsubscribeContacts([$contact1]);

        $this->assertInstanceOf(Contact::class, $response->getResult()[0]);
        $this->assertTrue($response->getResult()[0]->getId() === 27);
        $this->assertTrue($response->getResult()[0]->getSuccess());
    }

    public function testGetUserDefinedFields()
    {
        $query = ['query' => ['account_id' => 45429]];

        $response = $this->client->contact->getUserDefinedFields($query);

        $this->assertTrue(is_array($response->getResult()));
    }

    public function testGetContactGroups()
    {
        $response = $this->client->contact->getContactGroupsRequest(4);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testSearchContacts()
    {
        $searchParams = [
            'query'  => ['account_id' => 45429, 'group_id' => 5],
            'from'   => 'single',
            'groups' => [
                ['value' => '1'],
                ['value' => 2],
            ],
        ];

        $response = $this->client->contact->searchContacts($searchParams);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testAddUserDefinedField()
    {
        $newFieldParams = [
            'query'     => ['group_id' => 5, 'account_id' => 45429],
            'fieldName' => 'Test field',
        ];

        $response = $this->client->contact->addUserDefinedField($newFieldParams);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testEditUserDefinedField()
    {
        $newFieldParams = [
            'query'     => [
                'group_id'   => 5,
                'account_id' => 45429,
            ],
            'fieldName' => 'Test field',
        ];

        $response = $this->client->contact->editUserDefinedField($newFieldParams);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testDeleteUserDefinedField()
    {
        $newFieldParams = [
            'query'     => [
                'group_id'   => 5,
                'account_id' => 45429,
            ],
            'fieldName' => 'Test field',
        ];

        $response = $this->client->contact->deleteUserDefinedField($newFieldParams);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testAddContactsToGroup()
    {
        $response = $this->client->contact->addContactsToGroup(
            [
                'query'    => [
                    'group_id'   => 19,
                    'account_id' => 45429,
                ],
                'contacts' => [
                    ['query' => ['contact_id' => 6]],
                ],
            ]
        );

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testDeleteContactsToGroup()
    {
        $response = $this->client->contact->deleteContactsFromGroup([
            'query'    => ['group_id' => 19, 'account_id' => 45429],
            'contacts' => [
                ['query' => ['contact_id' => 6]],
            ],
        ]);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }
}
