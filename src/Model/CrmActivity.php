<?php

/*
 * @package greenrope-api-client
 * @license MIT License
 */

namespace Sctr\Greenrope\Api\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("CRMActivity")
 */
class CrmActivity extends AbstractModel
{
    const ALLOWED_QUERY_PARAMS = [
        'contact_id',
        'activity_id',
        'contact_firstname',
        'contact_lastname',
        'doneby_contact_id',
        'activity',
    ];

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Activity_id")
     */
    protected $id;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Contact_id")
     */
    protected $contactId;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Contact_firstname")
     */
    protected $contactFirstname;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Contact_lastname")
     */
    protected $contactLastname;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Done_by_contact_id")
     */
    protected $doneByContactId;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Done_by_lastname")
     */
    protected $doneByLastname;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Done_by_firstname")
     */
    protected $doneByFirstname;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Group_id")
     */
    protected $groupId;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Group_name")
     */
    protected $groupName;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     * @Serializer\SerializedName("Date")
     */
    protected $date;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Done_date")
     */
    protected $doneDate;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Due_date")
     */
    protected $dueDate;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $activity;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("string")
     */
    protected $notes;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     */
    protected $updatedTimeStamp;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     */
    protected $accountNumber;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Opportunity_id")
     */
    protected $opportunityId;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Opportunity_title")
     */
    protected $opportunityTitle;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Completed_by_contact_id")
     */
    protected $completedByContact;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Completed_by_firstname")
     */
    protected $completedByFirstname;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Completed_by_lastname")
     */
    protected $completedByLastname;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Completed_by_email")
     */
    protected $completedByEmail;

    /**
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\SkipWhenEmpty()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Workflow_id")
     */
    protected $workflowId;
}
