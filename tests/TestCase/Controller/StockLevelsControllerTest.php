<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StockLevelsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StockLevelsController Test Case
 */
class StockLevelsControllerTest extends IntegrationTestCase
{

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
        'app.customers_promotions',
        'app.membership_points'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
