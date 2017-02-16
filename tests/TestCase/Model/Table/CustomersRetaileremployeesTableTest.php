<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersRetaileremployeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersRetaileremployeesTable Test Case
 */
class CustomersRetaileremployeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersRetaileremployeesTable
     */
    public $CustomersRetaileremployees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers_retaileremployees',
        'app.customers',
        'app.custmembershiptiers',
        'app.retaileremployees',
        'app.locations',
        'app.items',
        'app.prodtypes',
        'app.prodcats',
        'app.sections',
        'app.deliveryorderitems',
        'app.transactionitems',
        'app.transferorderitems',
        'app.stocklevels',
        'app.transactions',
        'app.promotions',
        'app.locations_promotions',
        'app.custmembershiptiers_retaileremployees',
        'app.employeeroles',
        'app.retaileremployees_employeeroles',
        'app.suppliermemos',
        'app.retaileremployees_suppliermemos',
        'app.retaileremployees_transactions',
        'app.transferorders',
        'app.retaileremployees_transferorders',
        'app.membershippoints',
        'app.promotionemails',
        'app.customers_promotionemails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CustomersRetaileremployees') ? [] : ['className' => 'App\Model\Table\CustomersRetaileremployeesTable'];
        $this->CustomersRetaileremployees = TableRegistry::get('CustomersRetaileremployees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomersRetaileremployees);

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
