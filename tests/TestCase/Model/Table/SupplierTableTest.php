<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplierTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplierTable Test Case
 */
class SupplierTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SupplierTable
     */
    public $Supplier;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supplier'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Supplier') ? [] : ['className' => 'App\Model\Table\SupplierTable'];
        $this->Supplier = TableRegistry::get('Supplier', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Supplier);

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
