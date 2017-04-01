<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnnouncementRecipientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnnouncementRecipientsTable Test Case
 */
class AnnouncementRecipientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AnnouncementRecipientsTable
     */
    public $AnnouncementRecipients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.announcement_recipients',
        'app.announcements',
        'app.intrasys_employees',
        'app.intrasys_employee_roles',
        'app.intrasys_employees_intrasys_employee_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AnnouncementRecipients') ? [] : ['className' => 'App\Model\Table\AnnouncementRecipientsTable'];
        $this->AnnouncementRecipients = TableRegistry::get('AnnouncementRecipients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AnnouncementRecipients);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
