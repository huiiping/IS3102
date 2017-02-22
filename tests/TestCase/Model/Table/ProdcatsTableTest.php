<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdCatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdCatsTable Test Case
 */
class ProdCatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdCatsTable
     */
    public $ProdCats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prod_cats',
        'app.prod_types',
        'app.promotions',
        'app.retailer_employees',
        'app.locations',
        'app.sections',
        'app.purchase_orders',
        'app.suppliers',
        'app.supplier_memos',
        'app.purchase_order_items',
        'app.messages',
        'app.retailer_employees_messages',
        'app.retailer_employee_roles',
        'app.retailer_employees_retailer_employee_roles',
        'app.customers',
        'app.cust_membership_tiers',
        'app.customers_promotions',
        'app.promotions_prod_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProdCats') ? [] : ['className' => 'App\Model\Table\ProdCatsTable'];
        $this->ProdCats = TableRegistry::get('ProdCats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProdCats);

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
}
