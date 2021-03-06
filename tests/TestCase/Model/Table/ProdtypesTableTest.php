<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProdTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProdTypesTable Test Case
 */
class ProdTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProdTypesTable
     */
    public $ProdTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prod_types',
        'app.prod_cats',
        'app.promotions',
        'app.promotions_prod_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProdTypes') ? [] : ['className' => 'App\Model\Table\ProdTypesTable'];
        $this->ProdTypes = TableRegistry::get('ProdTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProdTypes);

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
