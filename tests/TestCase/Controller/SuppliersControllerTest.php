<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SuppliersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SuppliersController Test Case
 */
class SuppliersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.suppliers',
        'app.purchase_orders',
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
        'app.retailer_employees_retailer_employeer_roles',
        'app.supplier_memos',
        'app.messages',
        'app.references',
        'app.retailer_employees_messages',
        'app.purchase_order_items'
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
