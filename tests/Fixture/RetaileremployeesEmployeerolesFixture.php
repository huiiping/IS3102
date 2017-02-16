<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RetaileremployeesEmployeerolesFixture
 *
 */
class RetaileremployeesEmployeerolesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'retailerEmployee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'employeeRole_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'employeeRole_id' => ['type' => 'index', 'columns' => ['employeeRole_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['retailerEmployee_id', 'employeeRole_id'], 'length' => []],
            'retaileremployees_employeeroles_ibfk_1' => ['type' => 'foreign', 'columns' => ['retailerEmployee_id'], 'references' => ['retaileremployees', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'retaileremployees_employeeroles_ibfk_2' => ['type' => 'foreign', 'columns' => ['employeeRole_id'], 'references' => ['employeeroles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'retailerEmployee_id' => 1,
            'employeeRole_id' => 1
        ],
    ];
}
