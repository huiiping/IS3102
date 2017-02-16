<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersPromotionemailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersPromotionemailsTable Test Case
 */
class CustomersPromotionemailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersPromotionemailsTable
     */
    public $CustomersPromotionemails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers_promotionemails',
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
        'app.customers_retaileremployees',
        'app.employeeroles',
        'app.retaileremployees_employeeroles',
        'app.suppliermemos',
        'app.retaileremployees_suppliermemos',
        'app.retaileremployees_transactions',
        'app.transferorders',
        'app.retaileremployees_transferorders',
        'app.membershippoints',
        'app.promotionemails'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CustomersPromotionemails') ? [] : ['className' => 'App\Model\Table\CustomersPromotionemailsTable'];
        $this->CustomersPromotionemails = TableRegistry::get('CustomersPromotionemails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomersPromotionemails);

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
