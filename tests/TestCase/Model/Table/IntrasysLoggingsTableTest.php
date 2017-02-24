<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IntrasysLoggingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IntrasysLoggingsTable Test Case
 */
class IntrasysLoggingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IntrasysLoggingsTable
     */
    public $IntrasysLoggings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.intrasys_loggings',
        'app.retailers',
        'app.retailer_acc_types',
        'app.retailer_loyalty_points',
        'app.employees'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('IntrasysLoggings') ? [] : ['className' => 'App\Model\Table\IntrasysLoggingsTable'];
        $this->IntrasysLoggings = TableRegistry::get('IntrasysLoggings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IntrasysLoggings);

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
