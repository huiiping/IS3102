<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetaileremployeesMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetaileremployeesMessagesTable Test Case
 */
class RetaileremployeesMessagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetaileremployeesMessagesTable
     */
    public $RetaileremployeesMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retaileremployees_messages',
        'app.retaileremployees',
        'app.locations',
        'app.sections',
        'app.messages',
        'app.references',
        'app.retaileremployeeroles',
        'app.retaileremployees_retaileremployeeroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RetaileremployeesMessages') ? [] : ['className' => 'App\Model\Table\RetaileremployeesMessagesTable'];
        $this->RetaileremployeesMessages = TableRegistry::get('RetaileremployeesMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RetaileremployeesMessages);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
