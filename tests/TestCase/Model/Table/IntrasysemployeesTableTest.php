<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IntrasysEmployeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IntrasysEmployeesTable Test Case
 */
class IntrasysEmployeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IntrasysEmployeesTable
     */
    public $IntrasysEmployees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.intrasys_employees',
        'app.intrasys_employee_roles',
        'app.intrasys_employees_intrasys_employee_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('IntrasysEmployees') ? [] : ['className' => 'App\Model\Table\IntrasysEmployeesTable'];
        $this->IntrasysEmployees = TableRegistry::get('IntrasysEmployees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IntrasysEmployees);

        parent::tearDown();
    }

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
