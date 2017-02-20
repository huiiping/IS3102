<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetailersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetailersTable Test Case
 */
class RetailersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetailersTable
     */
    public $Retailers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retailers',
        'app.retailer_acc_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Retailers') ? [] : ['className' => 'App\Model\Table\RetailersTable'];
        $this->Retailers = TableRegistry::get('Retailers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Retailers);

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
