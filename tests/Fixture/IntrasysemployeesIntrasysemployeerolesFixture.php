<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IntrasysEmployeesIntrasysEmployeeRolesFixture
 *
 */
class IntrasysEmployeesIntrasysEmployeeRolesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'intrasys_employee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'intrasys_employee_role_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'intrasys_employee_role_id' => ['type' => 'index', 'columns' => ['intrasys_employee_role_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['intrasys_employee_id', 'intrasys_employee_role_id'], 'length' => []],
            'intrasys_employees_intrasys_employee_roles_ibfk_1' => ['type' => 'foreign', 'columns' => ['intrasys_employee_id'], 'references' => ['intrasys_employees', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'intrasys_employees_intrasys_employee_roles_ibfk_2' => ['type' => 'foreign', 'columns' => ['intrasys_employee_role_id'], 'references' => ['intrasys_employee_roles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'intrasys_employee_id' => 1,
            'intrasys_employee_role_id' => 1
        ],
    ];
}
