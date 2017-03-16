<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransferOrdersFixture
 *
 */
class TransferOrdersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'locationFrom' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'locationTo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'remarks' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'retailer_employee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'retailer_employee_id' => ['type' => 'index', 'columns' => ['retailer_employee_id'], 'length' => []],
            'locationFrom' => ['type' => 'index', 'columns' => ['locationFrom'], 'length' => []],
            'locationTo' => ['type' => 'index', 'columns' => ['locationTo'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'transfer_orders_ibfk_1' => ['type' => 'foreign', 'columns' => ['retailer_employee_id'], 'references' => ['retailer_employees', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'transfer_orders_ibfk_2' => ['type' => 'foreign', 'columns' => ['locationFrom'], 'references' => ['locations', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'transfer_orders_ibfk_3' => ['type' => 'foreign', 'columns' => ['locationTo'], 'references' => ['locations', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id' => 1,
            'locationFrom' => 1,
            'locationTo' => 1,
            'status' => 'Lorem ipsum dolor sit amet',
            'remarks' => 'Lorem ipsum dolor sit amet',
            'retailer_employee_id' => 1,
            'created' => '2017-03-16 17:29:08'
        ],
    ];
}
