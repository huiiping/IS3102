<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IntrasysemployeesIntrasysemployeerolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IntrasysemployeesIntrasysemployeerolesTable Test Case
 */
class IntrasysemployeesIntrasysemployeerolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IntrasysemployeesIntrasysemployeerolesTable
     */
    public $IntrasysemployeesIntrasysemployeeroles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.intrasysemployees_intrasysemployeeroles',
        'app.intrasysemployees',
        'app.intrasysemployeeroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('IntrasysemployeesIntrasysemployeeroles') ? [] : ['className' => 'App\Model\Table\IntrasysemployeesIntrasysemployeerolesTable'];
        $this->IntrasysemployeesIntrasysemployeeroles = TableRegistry::get('IntrasysemployeesIntrasysemployeeroles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IntrasysemployeesIntrasysemployeeroles);

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
