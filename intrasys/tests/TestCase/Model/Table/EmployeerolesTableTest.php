<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeerolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeerolesTable Test Case
 */
class EmployeerolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeerolesTable
     */
    public $Employeeroles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employeeroles',
        'app.intrasysemployees',
        'app.announcements',
        'app.intrasysemployees_announcements',
        'app.intrasysemployees_employeeroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Employeeroles') ? [] : ['className' => 'App\Model\Table\EmployeerolesTable'];
        $this->Employeeroles = TableRegistry::get('Employeeroles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Employeeroles);

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
