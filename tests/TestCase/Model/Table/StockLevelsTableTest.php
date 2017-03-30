<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StockLevelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StockLevelsTable Test Case
 */
class StockLevelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StockLevelsTable
     */
    public $StockLevels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stock_levels',
        'app.locations',
        'app.delivery_orders',
        'app.customers',
        'app.cust_membership_tiers',
        'app.promotions',
        'app.retailer_employees',
        'app.purchase_orders',
        'app.suppliers',
        'app.supplier_memos',
        'app.rfqs',
        'app.rfqs_suppliers',
        'app.purchase_order_items',
        'app.items',
        'app.products',
        'app.prod_cats',
        'app.prod_specifications',
        'app.products_prod_specifications',
        'app.promotions_products',
        'app.sections',
        'app.inventory',
        'app.delivery_order_items',
        'app.feedbacks',
        'app.reports',
        'app.transaction_items',
        'app.transactions',
        'app.transfer_order_items',
        'app.transfer_orders',
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
        $config = TableRegistry::exists('StockLevels') ? [] : ['className' => 'App\Model\Table\StockLevelsTable'];
        $this->StockLevels = TableRegistry::get('StockLevels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StockLevels);

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
