<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdtypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdtypesTable Test Case
 */
class ProdtypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdtypesTable
     */
    public $Prodtypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prodtypes',
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
        'app.retaileremployees_transferorders',
        'app.prodcats'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Prodtypes') ? [] : ['className' => 'App\Model\Table\ProdtypesTable'];
        $this->Prodtypes = TableRegistry::get('Prodtypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prodtypes);

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
