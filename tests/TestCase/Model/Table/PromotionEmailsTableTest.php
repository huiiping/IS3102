<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PromotionEmailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PromotionEmailsTable Test Case
 */
class PromotionEmailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PromotionEmailsTable
     */
    public $PromotionEmails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.promotion_emails',
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
        'app.prod_types',
        'app.prod_cats',
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
        $config = TableRegistry::exists('PromotionEmails') ? [] : ['className' => 'App\Model\Table\PromotionEmailsTable'];
        $this->PromotionEmails = TableRegistry::get('PromotionEmails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PromotionEmails);

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
