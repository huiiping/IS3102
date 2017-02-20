<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IntrasysEmployeeRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IntrasysEmployeeRolesTable Test Case
 */
class IntrasysEmployeeRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IntrasysEmployeeRolesTable
     */
    public $IntrasysEmployeeRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.intrasys_employee_roles',
        'app.intrasys_employees',
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
        $config = TableRegistry::exists('IntrasysEmployeeRoles') ? [] : ['className' => 'App\Model\Table\IntrasysEmployeeRolesTable'];
        $this->IntrasysEmployeeRoles = TableRegistry::get('IntrasysEmployeeRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IntrasysEmployeeRoles);

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
