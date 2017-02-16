<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransferorderitemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransferorderitemsTable Test Case
 */
class TransferorderitemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransferorderitemsTable
     */
    public $Transferorderitems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transferorderitems',
        'app.items',
        'app.locations',
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
        'app.transferorders',
        'app.retaileremployees_transferorders',
        'app.sections',
        'app.stocklevels',
        'app.prodtypes',
        'app.prodcats',
        'app.promotions',
        'app.item1s',
        'app.item2s',
        'app.prod_type1s',
        'app.prod_type2s',
        'app.prod_cats',
        'app.locations_promotions',
        'app.deliveryorderitems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Transferorderitems') ? [] : ['className' => 'App\Model\Table\TransferorderitemsTable'];
        $this->Transferorderitems = TableRegistry::get('Transferorderitems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Transferorderitems);

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
