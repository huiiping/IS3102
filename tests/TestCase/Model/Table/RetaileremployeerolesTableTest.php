<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetailerEmployeeRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetailerEmployeeRolesTable Test Case
 */
class RetailerEmployeeRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetailerEmployeeRolesTable
     */
    public $RetailerEmployeeRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retailer_employee_roles',
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
        'app.purchase_orders',
        'app.suppliers',
        'app.supplier_memos',
        'app.purchase_order_items',
        'app.messages',
        'app.references',
        'app.retailer_employees_messages',
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
        $config = TableRegistry::exists('RetailerEmployeeRoles') ? [] : ['className' => 'App\Model\Table\RetailerEmployeeRolesTable'];
        $this->RetailerEmployeeRoles = TableRegistry::get('RetailerEmployeeRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RetailerEmployeeRoles);

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
