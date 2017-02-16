<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RetaileremployeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RetaileremployeesTable Test Case
 */
class RetaileremployeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RetaileremployeesTable
     */
    public $Retaileremployees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.retaileremployees',
        'app.locations',
        'app.sections',
        'app.messages',
        'app.retaileremployees_messages',
        'app.retaileremployeeroles',
        'app.retaileremployees_retaileremployeeroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Retaileremployees') ? [] : ['className' => 'App\Model\Table\RetaileremployeesTable'];
        $this->Retaileremployees = TableRegistry::get('Retaileremployees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Retaileremployees);

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
