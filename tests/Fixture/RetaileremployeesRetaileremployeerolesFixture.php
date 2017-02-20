<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RetailerEmployeesRetailerEmployeeRolesFixture
 *
 */
class RetailerEmployeesRetailerEmployeeRolesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'retailer_employee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'retailer_employee_role_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'retailer_employee_role_id' => ['type' => 'index', 'columns' => ['retailer_employee_role_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['retailer_employee_id', 'retailer_employee_role_id'], 'length' => []],
            'retailer_employees_retailer_employee_roles_ibfk_1' => ['type' => 'foreign', 'columns' => ['retailer_employee_id'], 'references' => ['retailer_employees', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'retailer_employees_retailer_employee_roles_ibfk_2' => ['type' => 'foreign', 'columns' => ['retailer_employee_role_id'], 'references' => ['retailer_employee_roles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'retailer_employee_id' => 1,
            'retailer_employee_role_id' => 1
        ],
    ];
}
