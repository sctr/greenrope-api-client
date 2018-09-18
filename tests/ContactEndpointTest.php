<?php

namespace Sctr\Greenrope\Api\Tests;

use Sctr\Greenrope\Api\ApiResponse;
use Sctr\Greenrope\Api\Model\Contact;

class ContactEndpointTest extends BaseTest
{
    public function testAddContactsRequest()
    {
        $contact1 = [
            'query' => ['account_id' => 45429],
            'firstName' => 'Test 1',
            'lastName' => 'Test 1',
            'email' => 'testEmail1@test.com',
            'company' => 'Company test 1',
            'title' => 'Title test 1',
            'Address1' => 'Address 1 1',
            'groups' => [
                ['id' => 1, 'name' => "test"]
            ]
        ];

        $contact2 = [
            'query' => ['account_id' => 45429],
            'firstName' => 'Test 2',
            'lastName' => 'Test 2',
            'email' => 'testEmail2@test.com',
            'company' => 'Company test 2',
            'title' => 'Title test 2',
            'Address1' => 'Address 2 1',
            'groups' => [
                ['id' => 1, 'name' => "test"]
            ]
        ];

        /** @var ApiResponse $response */
        $response = $this->client->contact->addContacts([$contact1, $contact2]);

        $this->assertTrue(is_array($response->getResult()));

        $this->assertInstanceOf(Contact::class, $response->getResult()[0]);
        $this->assertInstanceOf(Contact::class, $response->getResult()[1]);
    }

    public function testGetContacts()
    {
        $searchAttributes = [
            'account_id' => 45429
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
            'query' => [
                'account_id' => 45429,
                'contact_id' => 27
            ],
            'firstName' => 'Test Edited',
            'lastName' => 'Test Edited',
        ];

        $response = $this->client->contact->editContacts([$editContact1]);

        $this->assertTrue(is_array($response->getResult()));
        $this->assertInstanceOf(Contact::class, $response->getResult()[0]);
        $this->assertTrue($response->getResult()[0]->getSuccess());
    }

    public function testDeleteContacts()
    {
        $contact1 = ['query' => ['contact_id' => 27, 'account_id' => 45429]];

        $response = $this->client->contact->deleteContacts([$contact1]);

        $this->assertInstanceOf(Contact::class, $response->getResult()[0]);
        $this->assertTrue($response->getResult()[0]->getId() === 27);
        $this->assertTrue($response->getResult()[0]->getSuccess());
    }
}
