<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustmembershiptiersRetaileremployeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustmembershiptiersRetaileremployeesTable Test Case
 */
class CustmembershiptiersRetaileremployeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustmembershiptiersRetaileremployeesTable
     */
    public $CustmembershiptiersRetaileremployees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.custmembershiptiers_retaileremployees',
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
        'app.customers',
        'app.membershippoints',
        'app.promotionemails',
        'app.customers_promotionemails',
        'app.customers_retaileremployees',
        'app.employeeroles',
        'app.retaileremployees_employeeroles',
        'app.suppliermemos',
        'app.retaileremployees_suppliermemos',
        'app.retaileremployees_transactions',
        'app.transferorders',
        'app.retaileremployees_transferorders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CustmembershiptiersRetaileremployees') ? [] : ['className' => 'App\Model\Table\CustmembershiptiersRetaileremployeesTable'];
        $this->CustmembershiptiersRetaileremployees = TableRegistry::get('CustmembershiptiersRetaileremployees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustmembershiptiersRetaileremployees);

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
