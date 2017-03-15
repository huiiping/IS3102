<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransferOrdersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransferOrdersTable Test Case
 */
class TransferOrdersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransferOrdersTable
     */
    public $TransferOrders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transfer_orders',
        'app.retailer_employees',
        'app.locations',
        'app.sections',
        'app.promotions',
        'app.cust_membership_tiers',
        'app.customers',
        'app.customers_promotions',
        'app.cust_membership_tiers_promotions',
        'app.prod_types',
        'app.promotions_prod_types',
        'app.purchase_orders',
        'app.suppliers',
        'app.supplier_memos',
        'app.purchase_order_items',
        'app.retailer_loggings',
        'app.messages',
        'app.retailer_employees_messages',
        'app.retailer_employee_roles',
        'app.retailer_employees_retailer_employee_roles',
        'app.transfer_order_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TransferOrders') ? [] : ['className' => 'App\Model\Table\TransferOrdersTable'];
        $this->TransferOrders = TableRegistry::get('TransferOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TransferOrders);

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
