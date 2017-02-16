<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetaileremployeesEmployeerolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetaileremployeesEmployeerolesTable Test Case
 */
class RetaileremployeesEmployeerolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetaileremployeesEmployeerolesTable
     */
    public $RetaileremployeesEmployeeroles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retaileremployees_employeeroles',
        'app.retaileremployees',
        'app.locations',
        'app.items',
        'app.prodtypes',
        'app.prodcats',
        'app.sections',
        'app.deliveryorderitems',
        'app.deliveryorders',
        'app.transactions',
        'app.transactionitems',
        'app.transferorderitems',
        'app.stocklevels',
        'app.promotions',
        'app.item1s',
        'app.item2s',
        'app.prod_type1s',
        'app.prod_type2s',
        'app.prod_cats',
        'app.locations_promotions',
        'app.custmembershiptiers',
        'app.custmembershiptiers_retaileremployees',
        'app.customers',
        'app.membershippoints',
        'app.promotionemails',
        'app.customers_promotionemails',
        'app.customers_retaileremployees',
        'app.employeeroles',
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
        $config = TableRegistry::exists('RetaileremployeesEmployeeroles') ? [] : ['className' => 'App\Model\Table\RetaileremployeesEmployeerolesTable'];
        $this->RetaileremployeesEmployeeroles = TableRegistry::get('RetaileremployeesEmployeeroles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RetaileremployeesEmployeeroles);

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