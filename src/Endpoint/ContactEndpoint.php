<?php

namespace Sctr\Greenrope\Api\Endpoint;

use Sctr\Greenrope\Api\Response\Contact\AddContactsResponse;
use Sctr\Greenrope\Api\Response\Contact\DeleteContactsResponse;
use Sctr\Greenrope\Api\Response\Contact\GetContactsResponse;

class ContactEndpoint extends AbstractEndpoint
{
    /**
     * @param array $contacts
     * @return array
     */
    public function addContacts(array $contacts)
    {
        /** @var AddContactsResponse $response */
        $response = $this->handleRequest('Contact', 'add', $contacts);

        return $response->getContacts();
    }

    public function getContacts(array $searchAttributes = [])
    {
        /** @var GetContactsResponse $response */
        $response = $this->handleRequest('Contact', 'get', $searchAttributes);

        return $response->getContacts();
    }

    public function editContacts(array $contacts)
    {
        /** @var GetContactsResponse $response */
        $response = $this->handleRequest('Contact', 'edit', $contacts);

        return $response->getContacts();
    }

    public function deleteContacts(array $contacts)
    {
        /** @var DeleteContactsResponse $response */
        $response = $this->handleRequest('Contact', 'delete', $contacts);

        return $response->getContacts();
    }
}