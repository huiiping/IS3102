<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetaileremployeesRetaileremployeerolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetaileremployeesRetaileremployeerolesTable Test Case
 */
class RetaileremployeesRetaileremployeerolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetaileremployeesRetaileremployeerolesTable
     */
    public $RetaileremployeesRetaileremployeeroles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retaileremployees_retaileremployeeroles',
        'app.retaileremployees',
        'app.locations',
        'app.sections',
        'app.messages',
        'app.references',
        'app.retaileremployees_messages',
        'app.retaileremployeeroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RetaileremployeesRetaileremployeeroles') ? [] : ['className' => 'App\Model\Table\RetaileremployeesRetaileremployeerolesTable'];
        $this->RetaileremployeesRetaileremployeeroles = TableRegistry::get('RetaileremployeesRetaileremployeeroles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RetaileremployeesRetaileremployeeroles);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
