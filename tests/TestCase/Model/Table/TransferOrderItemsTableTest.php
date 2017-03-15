<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransferOrderItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransferOrderItemsTable Test Case
 */
class TransferOrderItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransferOrderItemsTable
     */
    public $TransferOrderItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transfer_order_items',
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
        'app.retailer_employees_retailer_employee_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TransferOrderItems') ? [] : ['className' => 'App\Model\Table\TransferOrderItemsTable'];
        $this->TransferOrderItems = TableRegistry::get('TransferOrderItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TransferOrderItems);

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
