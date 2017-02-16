<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoggingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoggingsTable Test Case
 */
class LoggingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoggingsTable
     */
    public $Loggings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loggings',
        'app.entities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Loggings') ? [] : ['className' => 'App\Model\Table\LoggingsTable'];
        $this->Loggings = TableRegistry::get('Loggings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loggings);

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
