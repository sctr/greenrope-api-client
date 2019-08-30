<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Tests;

use Sctr\Greenrope\Api\Request\Contact\AddContactsRequest;
use Sctr\Greenrope\Api\Request\Contact\AddContactsToGroupRequest;
use Sctr\Greenrope\Api\Request\Contact\SearchContactsRequest;
use Sctr\Greenrope\Api\Request\Event\GetEventsRequest;
use Sctr\Greenrope\Api\Request\Mail\SendTestMailRequest;
use Sctr\Greenrope\Api\Service\XmlSerializer;

class XmlSerializerTest extends BaseTest
{
    public function testSerializerSerialize()
    {
        $contact = [
            'query'             => ['account_id' => 45429],
            'id'                => 1,
            'firstName'         => 'Test',
            'lastName'          => 'Test',
            'company'           => 'Company test',
            'title'             => 'Title test',
            'Address1'          => 'Address 1',
            'groups'            => [
                ['id' => 1, 'name' => 'test'],
                ['id' => 2, 'name' => 'dfd'],
            ],
            'tags'              => [
                ['id' => 1, 'name' => 'test tag', 'abbreviation' => 'tt'],
                ['id' => 1, 'name' => 'test tag', 'abbreviation' => 'tt'],
            ],
            'userDefinedFields' => [
                ['query' => ['fieldname' => 'test fieldname'], 'value' => 'Dog'],
            ],
        ];

        $contacts = new AddContactsRequest(['contacts' => [$contact]]);

        $serializer        = new XmlSerializer();
        $serializedContact = $serializer->serializeObjectToXml($contacts);

        $this->assertStringStartsWith('<AddContactsRequest>', $serializedContact);
        $this->assertStringEndsWith('</AddContactsRequest>\n', $serializedContact);
        $this->assertTrue(strpos('<Groups>', $serializedContact) >= 0);
        $this->assertTrue(strpos('<Group>', $serializedContact) >= 0);
        $this->assertTrue(strpos('<Tags>', $serializedContact) >= 0);
        $this->assertTrue(strpos('<Tag>', $serializedContact) >= 0);
        $this->assertTrue(strpos('<UserDefinedFields>', $serializedContact) >= 0);
        $this->assertTrue(strpos('<UserDefinedField fieldname="test fieldname">Dog</UserDefinedField>', $serializedContact) >= 0);
    }

    public function testSearchContactsSerialize()
    {
        $request = [
            'accountId' => 45429,
            'from'      => 'Bla',
            'filter'    => 'Any',
            'orderBy'   => 'ID',
            'includes'  => [
                'unsubscribers'   => 'Y',
                'bouncedContacts' => 'Y',
            ],
            'rules'     => [
                ['field' => 'id', 'operator' => 'contains', 'value' => 123],
                ['field' => 'id', 'operator' => 'contains', 'value' => 123],
            ],
            'groups'    => [
                ['value' => '1'],
                ['value' => 2],
            ],
        ];

        $request = new SearchContactsRequest($request);

        $serializer        = new XmlSerializer();
        $serializedRequest = $serializer->serializeObjectToXml($request);

        $this->assertStringStartsWith('<SearchContactsRequest', $serializedRequest);
        $this->assertStringEndsWith("</SearchContactsRequest>\n", $serializedRequest);
        $this->assertTrue(strpos('<Includes>', $serializedRequest) >= 0);
        $this->assertTrue(strpos('<\Includes>', $serializedRequest) >= 0);
        $this->assertTrue(strpos('<Unsubscribers>', $serializedRequest) >= 0);
        $this->assertTrue(strpos('<\BouncedContacts>', $serializedRequest) >= 0);
        $this->assertTrue(strpos('<Filter>', $serializedRequest) >= 0);
        $this->assertTrue(strpos('<\From>', $serializedRequest) >= 0);
        $this->assertTrue(strpos('<Rules>', $serializedRequest) >= 0);
        $this->assertTrue(strpos('<\Rule>', $serializedRequest) >= 0);
        $this->assertTrue(strpos('<Field>', $serializedRequest) >= 0);
        $this->assertTrue(strpos('<\Operator>', $serializedRequest) >= 0);
    }

    public function testSerializeSendTestMail()
    {
        $requestData = [
            'accountId'  => 1,
            'fromName'   => 'Test',
            'fromEmail'  => 'test@test.com',
            'recipients' => ['bla', 'bla'],
        ];

        $request = new SendTestMailRequest($requestData);

        $serializer        = new XmlSerializer();
        $serializedRequest = $serializer->serializeObjectToXml($request);

        $this->assertStringStartsWith('<SendTestMailRequest', $serializedRequest);
        $this->assertTrue(strpos('</Recipients>', $serializedRequest) >= 0);
        $this->assertTrue(strpos('<Recipient>bla</Recipient>', $serializedRequest) >= 0);
    }

    public function testSerializeAddContactsToGroupRequest()
    {
        $requestdata = [
            'accountId' => 1,
            'contacts'  => [
                ['query' => ['contact_id' => 6]],
            ],
        ];

        $request = new AddContactsToGroupRequest($requestdata);

        $serializer        = new XmlSerializer();
        $serializedRequest = $serializer->serializeObjectToXml($request);

        $this->assertStringStartsWith('<AddContactsToGroupRequest', $serializedRequest);
    }

    public function testSerializeGetEventsRequest()
    {
        $requestdata = [
            'accountId'     => 1,
            'query'         => ['get_all' => true],
            'groupId'       => 2,
            'showAttendees' => 'Y',
        ];

        $request = new GetEventsRequest($requestdata);

        $serializer        = new XmlSerializer();
        $serializedRequest = $serializer->serializeObjectToXml($request);

        $this->assertStringStartsWith('<GetEventsRequest', $serializedRequest);
    }
}
