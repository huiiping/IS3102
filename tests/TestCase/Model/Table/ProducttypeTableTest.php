<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProducttypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProducttypeTable Test Case
 */
class ProducttypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProducttypeTable
     */
    public $Producttype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.producttype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Producttype') ? [] : ['className' => 'App\Model\Table\ProducttypeTable'];
        $this->Producttype = TableRegistry::get('Producttype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Producttype);

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
