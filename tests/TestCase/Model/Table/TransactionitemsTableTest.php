<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransactionitemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransactionitemsTable Test Case
 */
class TransactionitemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransactionitemsTable
     */
    public $Transactionitems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.transactionitems',
        'app.items',
        'app.locations',
        'app.retaileremployees',
        'app.custmembershiptiers',
        'app.custmembershiptiers_retaileremployees',
        'app.customers',
        'app.membershippoints',
        'app.transactions',
        'app.promotionemails',
        'app.customers_promotionemails',
        'app.customers_retaileremployees',
        'app.employeeroles',
        'app.retaileremployees_employeeroles',
        'app.suppliermemos',
        'app.suppliers',
        'app.purchaseorders',
        'app.retaileremployees_suppliermemos',
        'app.retaileremployees_transactions',
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
        'app.transferorderitems',
        'app.locations_promotions',
        'app.deliveryorderitems',
        'app.deliveryorders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Transactionitems') ? [] : ['className' => 'App\Model\Table\TransactionitemsTable'];
        $this->Transactionitems = TableRegistry::get('Transactionitems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Transactionitems);

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
