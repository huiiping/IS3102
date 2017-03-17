<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RfqsSuppliersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RfqsSuppliersTable Test Case
 */
class RfqsSuppliersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RfqsSuppliersTable
     */
    public $RfqsSuppliers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rfqs_suppliers',
        'app.rfqs',
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
        $config = TableRegistry::exists('RfqsSuppliers') ? [] : ['className' => 'App\Model\Table\RfqsSuppliersTable'];
        $this->RfqsSuppliers = TableRegistry::get('RfqsSuppliers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RfqsSuppliers);

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
