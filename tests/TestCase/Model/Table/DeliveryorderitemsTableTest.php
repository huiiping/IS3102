<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeliveryorderitemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeliveryorderitemsTable Test Case
 */
class DeliveryorderitemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeliveryorderitemsTable
     */
    public $Deliveryorderitems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deliveryorderitems',
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
        'app.retaileremployees_suppliermemos',
        'app.retaileremployees_transactions',
        'app.transferorders',
        'app.retaileremployees_transferorders',
        'app.sections',
        'app.stocklevels',
        'app.promotions',
        'app.locations_promotions',
        'app.prodtypes',
        'app.prodcats',
        'app.transactionitems',
        'app.transferorderitems',
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
        $config = TableRegistry::exists('Deliveryorderitems') ? [] : ['className' => 'App\Model\Table\DeliveryorderitemsTable'];
        $this->Deliveryorderitems = TableRegistry::get('Deliveryorderitems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Deliveryorderitems);

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
