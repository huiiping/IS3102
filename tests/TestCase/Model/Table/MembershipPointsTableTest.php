<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MembershipPointsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MembershipPointsTable Test Case
 */
class MembershipPointsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MembershipPointsTable
     */
    public $MembershipPoints;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.membership_points',
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
        'app.customers_promotions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MembershipPoints') ? [] : ['className' => 'App\Model\Table\MembershipPointsTable'];
        $this->MembershipPoints = TableRegistry::get('MembershipPoints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MembershipPoints);

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
