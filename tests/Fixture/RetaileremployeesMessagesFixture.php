<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RetaileremployeesMessagesFixture
 *
 */
class RetaileremployeesMessagesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'retailerEmployee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'message_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'message_id' => ['type' => 'index', 'columns' => ['message_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['retailerEmployee_id', 'message_id'], 'length' => []],
            'retaileremployees_messages_ibfk_1' => ['type' => 'foreign', 'columns' => ['retailerEmployee_id'], 'references' => ['retaileremployees', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'retaileremployees_messages_ibfk_2' => ['type' => 'foreign', 'columns' => ['message_id'], 'references' => ['messages', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'message_id' => 1
        ],
    ];
}
