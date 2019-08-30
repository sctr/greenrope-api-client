<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Tests;

use Sctr\Greenrope\Api\ApiResponse;
use Sctr\Greenrope\Api\Model\Contact;
use Sctr\Greenrope\Api\Model\UserDefinedField;

class ContactEndpointTest extends BaseTest
{
    /** @var int */
    private $contactId;

    public function setUp()
    {
        parent::setUp();
    }

    public function testAddContactsRequest()
    {
        $contact1 = [
            'firstname'         => 'Test',
            'email  '           => 'testmail@tt.t',
            'userDefinedFields' => [
                ['query' => ['fieldname' => 'Username'], 'value' => 'Username value'],
                ['query' => ['fieldname' => 'Username'], 'value' => 'Username2 value'],
            ],
            'groups'            => [
                ['value' => 'Test group'],
            ],
        ];

        /** @var ApiResponse $response */
        $response = $this->client->contact->addContacts(['contacts' => [$contact1]]);

        $this->assertTrue(is_array($response->getResult()));

        $this->assertInstanceOf(Contact::class, $response->getResult()[0]);

        $this->contactId = $response->getResult()[0]->getId();
    }

    public function testGetContacts()
    {
        $searchAttributes = [
            'query' => ['start_chunk_page' => 0, 'start_chunk_size' => 200],
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
                'email' => 'testmail@tt.t',
            ],
            'firstname' => 'Test Edited',
            'lastname'  => 'Test Edited',
        ];

        $response = $this->client->contact->editContacts(['contacts' => [$editContact1]]);

        $this->assertTrue(is_array($response->getResult()));
        $this->assertInstanceOf(Contact::class, $response->getResult()[0]);
    }

    public function testDeleteContacts()
    {
        $contact1 = ['query' => ['email' => 'testmail@tt.t']];

        $response = $this->client->contact->deleteContacts(['contacts' => [$contact1]]);

        $this->assertInstanceOf(Contact::class, $response->getResult()[0]);
        $this->assertTrue($response->getResult()[0]->getId() > 0);
    }

    public function testGetUserDefinedFields()
    {
        $response = $this->client->contact->getUserDefinedFields();

        $this->assertTrue(is_array($response->getResult()));
        $this->assertInstanceOf(UserDefinedField::class, $response->getResult()[0]);
    }

    public function testGetContactGroups()
    {
        $response = $this->client->contact->getContactGroupsRequest(['contact_id' => 4]);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testSearchContacts()
    {
        $searchParams = [
            'query'  => ['group_id' => 2],
            'from'   => 'all',
            'filter' => 'all',
        ];

        $response = $this->client->contact->searchContacts($searchParams);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertTrue(is_array($response->getResult()));
        $this->assertInstanceOf(Contact::class, $response->getResult()['contacts'][0]);
    }

    public function testAddUserDefinedField()
    {
        $newFieldParams = [
            'query'           => ['group_id' => 2],
            'fieldName'       => 'Test',
            'fieldType'       => 'Select',
            'possibleValues'  => 'Test1, Test2, Test3',
            'contactEditable' => 'Visible',
        ];

        $response = $this->client->contact->addUserDefinedField($newFieldParams);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertTrue(is_numeric($response->getResult()['userFieldId']));
    }

    public function testEditUserDefinedField()
    {
        $newFieldParams = [
            'query'          => [
                'group_id' => 2,
            ],
            'fieldName'      => 'Test',
            'possibleValues' => 'Test1, Test2, Test3, Test4',
        ];

        $response = $this->client->contact->editUserDefinedField($newFieldParams);

        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertTrue(is_numeric($response->getResult()['userFieldId']));
    }

    public function testDeleteUserDefinedField()
    {
        $newFieldParams = [
            'query'     => [
                'group_id' => 2,
            ],
            'fieldName' => 'Test',
        ];

        $response = $this->client->contact->deleteUserDefinedField($newFieldParams);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testAddContactsToGroup()
    {
        $response = $this->client->contact->addContactsToGroup(
            [
                'query'    => [
                    'group_id' => 2,
                ],
                'contacts' => [
                    ['query' => ['email' => 'testmail@tt.t']],
                ],
            ]
        );

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testDeleteContactsFromGroup()
    {
        $response = $this->client->contact->deleteContactsFromGroup([
            'query'    => ['group_id' => 2],
            'contacts' => [
                ['query' => ['email' => 'testmail@tt.t']],
            ],
        ]);

        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testGetContactByEmail()
    {
        $response = $this->client->contact->getContactByEmail('testmail2@tt.t');

        $this->assertInstanceOf(Contact::class, $response);
        $this->assertEquals('testmail2@tt.t', $response->getEmail());
    }

    public function testAddUserDefinedFieldToContact()
    {
        $contact  = $this->client->contact->getContactByEmail('testmail2@tt.t');
        $response = $this->client->contact->addUserDefinedFieldToContact(
            $contact,
            'Test field name',
            'Test value for test fieldname for test user'
        );

        $this->assertTrue($response);
    }

    public function testGetUserDefinedFieldByName()
    {
        $contact = $this->client->contact->getContactByEmail('testmail2@tt.t');

        $field = $contact->getUserDefinedFieldByName('Username');

        $this->assertTrue(!empty($field));
        $this->assertEquals($field->getName(), 'Username');
    }

    public function testAddUpdateContact()
    {
        $contact1 = [
            'firstname'         => 'Test',
            'email'             => 'email@greenrope.com',
            'userDefinedFields' => [
                ['query' => ['fieldname' => 'Username'], 'value' => 'Username value'],
                ['query' => ['fieldname' => 'Username'], 'value' => 'Username2 value'],
            ],
        ];

        $contact = $this->client->contact->addUpdateContact($contact1, ['Test group'], true);

        $this->assertInstanceOf(Contact::class, $contact);
    }

    public function testEditContactWithReplace()
    {
        $editContact1 = [
            'query'     => [
                'contact_id' => 44712,
            ],
            'groups' => [
                ['value'  => 'Test group'],
                ['value'  => '[BANG] Free Leads (inactive)'],
                'replace' => true,
            ],
            'removeGroups' => [
                ['value' => '[BANG] Free Leads (inactive)'],
            ],
        ];

        $response = $this->client->contact->editContact($editContact1);

        $this->assertTrue(is_array($response->getResult()));
        $this->assertInstanceOf(Contact::class, $response->getResult()[0]);
    }
}
