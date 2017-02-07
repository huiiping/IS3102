<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetailerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetailerTable Test Case
 */
class RetailerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetailerTable
     */
    public $Retailer;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retailer'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Retailer') ? [] : ['className' => 'App\Model\Table\RetailerTable'];
        $this->Retailer = TableRegistry::get('Retailer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Retailer);

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
