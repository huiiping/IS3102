<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetailerLoyaltyPointsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetailerLoyaltyPointsTable Test Case
 */
class RetailerLoyaltyPointsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetailerLoyaltyPointsTable
     */
    public $RetailerLoyaltyPoints;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retailer_loyalty_points',
        'app.retailers',
        'app.retailer_acc_types',
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
        $config = TableRegistry::exists('RetailerLoyaltyPoints') ? [] : ['className' => 'App\Model\Table\RetailerLoyaltyPointsTable'];
        $this->RetailerLoyaltyPoints = TableRegistry::get('RetailerLoyaltyPoints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RetailerLoyaltyPoints);

        parent::tearDown();
    }

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
