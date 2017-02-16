<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransferordersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransferordersTable Test Case
 */
class TransferordersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransferordersTable
     */
    public $Transferorders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transferorders',
        'app.locations',
        'app.items',
        'app.prodtypes',
        'app.retaileremployees',
        'app.custmembershiptiers',
        'app.custmembershiptiers_retaileremployees',
        'app.customers',
        'app.membershippoints',
        'app.transactions',
        'app.deliveryorders',
        'app.transactionitems',
        'app.retaileremployees_transactions',
        'app.promotionemails',
        'app.customers_promotionemails',
        'app.customers_retaileremployees',
        'app.employeeroles',
        'app.retaileremployees_employeeroles',
        'app.suppliermemos',
        'app.suppliers',
        'app.purchaseorders',
        'app.retaileremployees_suppliermemos',
        'app.retaileremployees_transferorders',
        'app.prodcats',
        'app.sections',
        'app.deliveryorderitems',
        'app.transferorderitems',
        'app.promotions',
        'app.item1s',
        'app.item2s',
        'app.prod_type1s',
        'app.prod_type2s',
        'app.prod_cats',
        'app.locations_promotions',
        'app.stocklevels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Transferorders') ? [] : ['className' => 'App\Model\Table\TransferordersTable'];
        $this->Transferorders = TableRegistry::get('Transferorders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Transferorders);

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
