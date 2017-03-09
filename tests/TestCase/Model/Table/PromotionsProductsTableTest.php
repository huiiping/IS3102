<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PromotionsProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PromotionsProductsTable Test Case
 */
class PromotionsProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PromotionsProductsTable
     */
    public $PromotionsProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.promotions_products',
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
        'app.cust_membership_tiers',
        'app.customers',
        'app.customers_promotions',
        'app.cust_membership_tiers_promotions',
        'app.prod_types',
        'app.promotions_prod_types',
        'app.products',
        'app.prod_cats',
        'app.prod_specifications',
        'app.products_prod_specifications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PromotionsProducts') ? [] : ['className' => 'App\Model\Table\PromotionsProductsTable'];
        $this->PromotionsProducts = TableRegistry::get('PromotionsProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PromotionsProducts);

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
