<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierMemosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierMemosTable Test Case
 */
class SupplierMemosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SupplierMemosTable
     */
    public $SupplierMemos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supplier_memos',
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
        'app.messages',
        'app.references',
        'app.retailer_employees_messages',
        'app.purchase_order_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SupplierMemos') ? [] : ['className' => 'App\Model\Table\SupplierMemosTable'];
        $this->SupplierMemos = TableRegistry::get('SupplierMemos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplierMemos);

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
