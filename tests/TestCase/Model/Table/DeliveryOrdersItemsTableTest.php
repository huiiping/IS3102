<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeliveryOrdersItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeliveryOrdersItemsTable Test Case
 */
class DeliveryOrdersItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeliveryOrdersItemsTable
     */
    public $DeliveryOrdersItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.delivery_orders_items',
        'app.delivery_orders',
        'app.customers',
        'app.cust_membership_tiers',
        'app.promotions',
        'app.retailer_employees',
        'app.locations',
        'app.inventory',
        'app.products',
        'app.prod_cats',
        'app.feedbacks',
        'app.items',
        'app.sections',
        'app.delivery_order_items',
        'app.reports',
        'app.suppliers',
        'app.purchase_orders',
        'app.purchase_order_items',
        'app.supplier_memos',
        'app.rfqs',
        'app.rfqs_suppliers',
        'app.transaction_items',
        'app.transactions',
        'app.transfer_order_items',
        'app.stock_levels',
        'app.prod_specifications',
        'app.products_prod_specifications',
        'app.promotions_products',
        'app.retailer_loggings',
        'app.messages',
        'app.retailer_employees_messages',
        'app.retailer_employee_roles',
        'app.retailer_employees_retailer_employee_roles',
        'app.cust_membership_tiers_promotions',
        'app.membership_points',
        'app.customers_promotions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DeliveryOrdersItems') ? [] : ['className' => 'App\Model\Table\DeliveryOrdersItemsTable'];
        $this->DeliveryOrdersItems = TableRegistry::get('DeliveryOrdersItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeliveryOrdersItems);

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
