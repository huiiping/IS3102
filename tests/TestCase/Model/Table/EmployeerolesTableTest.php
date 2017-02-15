<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeerolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeerolesTable Test Case
 */
class EmployeerolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeerolesTable
     */
    public $Employeeroles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employeeroles',
        'app.retaileremployees',
        'app.locations',
        'app.items',
        'app.prodtypes',
        'app.prodcats',
        'app.sections',
        'app.deliveryorderitems',
        'app.transactionitems',
        'app.transferorderitems',
        'app.stocklevels',
        'app.transactions',
        'app.promotions',
        'app.locations_promotions',
        'app.custmembershiptiers',
        'app.custmembershiptiers_retaileremployees',
        'app.customers',
        'app.membershippoints',
        'app.promotionemails',
        'app.customers_promotionemails',
        'app.customers_retaileremployees',
        'app.retaileremployees_employeeroles',
        'app.suppliermemos',
        'app.retaileremployees_suppliermemos',
        'app.retaileremployees_transactions',
        'app.transferorders',
        'app.retaileremployees_transferorders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Employeeroles') ? [] : ['className' => 'App\Model\Table\EmployeerolesTable'];
        $this->Employeeroles = TableRegistry::get('Employeeroles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Employeeroles);

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
