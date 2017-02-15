<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdcatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdcatsTable Test Case
 */
class ProdcatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdcatsTable
     */
    public $Prodcats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prodcats',
        'app.retaileremployees',
        'app.locations',
        'app.items',
        'app.sections',
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
        $config = TableRegistry::exists('Prodcats') ? [] : ['className' => 'App\Model\Table\ProdcatsTable'];
        $this->Prodcats = TableRegistry::get('Prodcats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prodcats);

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
