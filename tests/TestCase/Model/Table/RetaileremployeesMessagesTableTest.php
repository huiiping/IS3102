<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetailerEmployeesMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetailerEmployeesMessagesTable Test Case
 */
class RetailerEmployeesMessagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetailerEmployeesMessagesTable
     */
    public $RetailerEmployeesMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retailer_employees_messages',
        'app.retailer_employees',
        'app.locations',
        'app.sections',
        'app.promotions',
        'app.customers',
        'app.cust_membership_tiers',
        'app.customers_promotions',
        'app.prod_types',
        'app.prod_cats',
        'app.promotions_prod_types',
        'app.purchase_orders',
        'app.suppliers',
        'app.supplier_memos',
        'app.purchase_order_items',
        'app.retailer_employees_retailer_employeer_roles',
        'app.messages',
        'app.references'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RetailerEmployeesMessages') ? [] : ['className' => 'App\Model\Table\RetailerEmployeesMessagesTable'];
        $this->RetailerEmployeesMessages = TableRegistry::get('RetailerEmployeesMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RetailerEmployeesMessages);

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