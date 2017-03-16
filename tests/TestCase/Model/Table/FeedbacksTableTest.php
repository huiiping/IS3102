<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeedbacksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeedbacksTable Test Case
 */
class FeedbacksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FeedbacksTable
     */
    public $Feedbacks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.feedbacks',
        'app.customers',
        'app.cust_membership_tiers',
        'app.promotions',
        'app.retailer_employees',
        'app.locations',
        'app.sections',
        'app.purchase_orders',
        'app.suppliers',
        'app.supplier_memos',
        'app.purchase_order_items',
        'app.retailer_loggings',
        'app.messages',
        'app.retailer_employees_messages',
        'app.retailer_employee_roles',
        'app.retailer_employees_retailer_employee_roles',
        'app.cust_membership_tiers_promotions',
        'app.prod_types',
        'app.promotions_prod_types',
        'app.customers_promotions',
        'app.products',
        'app.prod_cats',
        'app.prod_specifications',
        'app.products_prod_specifications',
        'app.promotions_products',
        'app.items',
        'app.reports',
        'app.delivery_orders',
        'app.transactions',
        'app.transaction_items',
        'app.delivery_order_items',
        'app.transfer_order_items',
        'app.transfer_orders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Feedbacks') ? [] : ['className' => 'App\Model\Table\FeedbacksTable'];
        $this->Feedbacks = TableRegistry::get('Feedbacks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Feedbacks);

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
