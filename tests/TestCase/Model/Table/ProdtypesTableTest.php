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
        'app.prodcats',
        'app.promotions',
        'app.retaileremployees',
        'app.locations',
        'app.sections',
        'app.messages',
        'app.references',
        'app.retaileremployees_messages',
        'app.retaileremployeeroles',
        'app.retaileremployees_retaileremployeeroles',
        'app.customers',
        'app.custmembershiptiers',
        'app.customers_promotions',
        'app.promotions_prodtypes'
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
