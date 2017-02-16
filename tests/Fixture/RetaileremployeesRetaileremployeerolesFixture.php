<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RetaileremployeesRetaileremployeerolesFixture
 *
 */
class RetaileremployeesRetaileremployeerolesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'retailerEmployee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'retailerEmployeeRoles_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'retailerEmployeeRoles_id' => ['type' => 'index', 'columns' => ['retailerEmployeeRoles_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['retailerEmployee_id', 'retailerEmployeeRoles_id'], 'length' => []],
            'retaileremployees_retaileremployeeroles_ibfk_1' => ['type' => 'foreign', 'columns' => ['retailerEmployee_id'], 'references' => ['retaileremployees', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'retaileremployees_retaileremployeeroles_ibfk_2' => ['type' => 'foreign', 'columns' => ['retailerEmployeeRoles_id'], 'references' => ['retaileremployeeroles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'retailerEmployeeRoles_id' => 1
        ],
    ];
}
