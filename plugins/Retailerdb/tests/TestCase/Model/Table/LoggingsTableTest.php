<?php
namespace Retailerdb\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Retailerdb\Model\Table\LoggingsTable;

/**
 * Retailerdb\Model\Table\LoggingsTable Test Case
 */
class LoggingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Retailerdb\Model\Table\LoggingsTable
     */
    public $Loggings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.retailerdb.loggings',
        'plugin.retailerdb.retailer_employees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Loggings') ? [] : ['className' => 'Retailerdb\Model\Table\LoggingsTable'];
        $this->Loggings = TableRegistry::get('Loggings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loggings);

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
