<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TransferOrdersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TransferOrdersController Test Case
 */
class TransferOrdersControllerTest extends IntegrationTestCase
{

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
        'app.products',
        'app.prod_cats',
        'app.prod_specifications',
        'app.products_prod_specifications',
        'app.promotions_products',
        'app.purchase_orders',
        'app.suppliers',
        'app.supplier_memos',
        'app.rfqs',
        'app.rfqs_suppliers',
        'app.purchase_order_items',
        'app.retailer_loggings',
        'app.messages',
        'app.retailer_employees_messages',
        'app.retailer_employee_roles',
        'app.retailer_employees_retailer_employee_roles',
        'app.transfer_order_items',
        'app.items',
        'app.reports',
        'app.delivery_orders',
        'app.transactions',
        'app.transaction_items',
        'app.delivery_order_items',
        'app.feedbacks'
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
