<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TransactionsItemsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TransactionsItemsController Test Case
 */
class TransactionsItemsControllerTest extends IntegrationTestCase
{

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
        'app.customers_promotions',
        'app.membership_points',
        'app.transaction_items'
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
