<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdSpecificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdSpecificationsTable Test Case
 */
class ProdSpecificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdSpecificationsTable
     */
    public $ProdSpecifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prod_specifications',
        'app.products',
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
        'app.cust_membership_tiers',
        'app.customers',
        'app.customers_promotions',
        'app.cust_membership_tiers_promotions',
        'app.promotions_prod_types',
        'app.products_prod_specifications',
        'app.promotions_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProdSpecifications') ? [] : ['className' => 'App\Model\Table\ProdSpecificationsTable'];
        $this->ProdSpecifications = TableRegistry::get('ProdSpecifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProdSpecifications);

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
