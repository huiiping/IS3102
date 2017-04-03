<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsItemsFixture
 *
 */
class TransactionsItemsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'transaction_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'item_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'item_id' => ['type' => 'index', 'columns' => ['item_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['transaction_id', 'item_id'], 'length' => []],
            'transactions_items_ibfk_1' => ['type' => 'foreign', 'columns' => ['transaction_id'], 'references' => ['transactions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'transactions_items_ibfk_2' => ['type' => 'foreign', 'columns' => ['item_id'], 'references' => ['items', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'transaction_id' => 1,
            'item_id' => 1
        ],
    ];
}
