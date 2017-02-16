<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IntrasysemployeesIntrasysemployeerolesFixture
 *
 */
class IntrasysemployeesIntrasysemployeerolesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'intrasysEmployee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'intrasysEmployeeRole_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'intrasysEmployeeRole_id' => ['type' => 'index', 'columns' => ['intrasysEmployeeRole_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['intrasysEmployee_id', 'intrasysEmployeeRole_id'], 'length' => []],
            'intrasysemployees_intrasysemployeeroles_ibfk_1' => ['type' => 'foreign', 'columns' => ['intrasysEmployee_id'], 'references' => ['intrasysemployees', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'intrasysemployees_intrasysemployeeroles_ibfk_2' => ['type' => 'foreign', 'columns' => ['intrasysEmployeeRole_id'], 'references' => ['intrasysemployeeroles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'intrasysEmployee_id' => 1,
            'intrasysEmployeeRole_id' => 1
        ],
    ];
}
