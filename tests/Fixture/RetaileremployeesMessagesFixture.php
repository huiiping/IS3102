<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RetailerEmployeesMessagesFixture
 *
 */
class RetailerEmployeesMessagesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'retailer_employee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'message_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'message_id' => ['type' => 'index', 'columns' => ['message_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['retailer_employee_id', 'message_id'], 'length' => []],
            'retailer_employees_messages_ibfk_1' => ['type' => 'foreign', 'columns' => ['retailer_employee_id'], 'references' => ['retailer_employees', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'retailer_employees_messages_ibfk_2' => ['type' => 'foreign', 'columns' => ['message_id'], 'references' => ['messages', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'message_id' => 1
        ],
    ];
}
