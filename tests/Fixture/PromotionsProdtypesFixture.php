<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PromotionsProdTypesFixture
 *
 */
class PromotionsProdTypesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'promotion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'prod_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'prod_type_id' => ['type' => 'index', 'columns' => ['prod_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['promotion_id', 'prod_type_id'], 'length' => []],
            'promotions_prod_types_ibfk_1' => ['type' => 'foreign', 'columns' => ['promotion_id'], 'references' => ['promotions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'promotions_prod_types_ibfk_2' => ['type' => 'foreign', 'columns' => ['prod_type_id'], 'references' => ['prod_types', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'promotion_id' => 1,
            'prod_type_id' => 1
        ],
    ];
}
