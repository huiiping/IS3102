<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MembershippointsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MembershippointsTable Test Case
 */
class MembershippointsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MembershippointsTable
     */
    public $Membershippoints;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.membershippoints',
        'app.customers',
        'app.custmembershiptiers',
        'app.transactions',
        'app.promotionemails',
        'app.customers_promotionemails',
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
        'app.promotions',
        'app.locations_promotions',
        'app.custmembershiptiers_retaileremployees',
        'app.customers_retaileremployees',
        'app.employeeroles',
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
        $config = TableRegistry::exists('Membershippoints') ? [] : ['className' => 'App\Model\Table\MembershippointsTable'];
        $this->Membershippoints = TableRegistry::get('Membershippoints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Membershippoints);

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
