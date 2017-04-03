<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransactionsItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransactionsItemsTable Test Case
 */
class TransactionsItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransactionsItemsTable
     */
    public $TransactionsItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transactions_items',
        'app.transactions',
        'app.customers',
        'app.cust_membership_tiers',
        'app.promotions',
        'app.retailer_employees',
        'app.locations',
        'app.delivery_orders',
        'app.items',
        'app.products',
        'app.prod_cats',
        'app.feedbacks',
        'app.inventory',
        'app.sections',
        'app.stock_levels',
        'app.prod_specifications',
        'app.products_prod_specifications',
        'app.promotions_products',
        'app.delivery_orders_items',
        'app.transfer_orders',
        'app.suppliers',
        'app.purchase_orders',
        'app.purchase_order_items',
        'app.supplier_memos',
        'app.rfqs',
        'app.rfqs_suppliers',
        'app.transfer_orders_items',
        'app.reports',
        'app.retailer_loggings',
        'app.messages',
        'app.retailer_employees_messages',
        'app.retailer_employee_roles',
        'app.retailer_employees_retailer_employee_roles',
        'app.cust_membership_tiers_promotions',
        'app.membership_points',
        'app.customers_promotions',
        'app.transaction_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TransactionsItems') ? [] : ['className' => 'App\Model\Table\TransactionsItemsTable'];
        $this->TransactionsItems = TableRegistry::get('TransactionsItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TransactionsItems);

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
