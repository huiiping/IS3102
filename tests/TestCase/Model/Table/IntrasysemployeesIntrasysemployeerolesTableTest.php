<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IntrasysEmployeesIntrasysEmployeeRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IntrasysEmployeesIntrasysEmployeeRolesTable Test Case
 */
class IntrasysEmployeesIntrasysEmployeeRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IntrasysEmployeesIntrasysEmployeeRolesTable
     */
    public $IntrasysEmployeesIntrasysEmployeeRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.intrasys_employees_intrasys_employee_roles',
        'app.intrasys_employees',
        'app.intrasys_employee_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('IntrasysEmployeesIntrasysEmployeeRoles') ? [] : ['className' => 'App\Model\Table\IntrasysEmployeesIntrasysEmployeeRolesTable'];
        $this->IntrasysEmployeesIntrasysEmployeeRoles = TableRegistry::get('IntrasysEmployeesIntrasysEmployeeRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IntrasysEmployeesIntrasysEmployeeRoles);

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
