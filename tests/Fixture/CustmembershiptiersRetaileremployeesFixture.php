<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustmembershiptiersRetaileremployeesFixture
 *
 */
class CustmembershiptiersRetaileremployeesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'custMembershipTier_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'retailerEmployee_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'retailerEmployee_id' => ['type' => 'index', 'columns' => ['retailerEmployee_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['custMembershipTier_id', 'retailerEmployee_id'], 'length' => []],
            'custmembershiptiers_retaileremployees_ibfk_1' => ['type' => 'foreign', 'columns' => ['custMembershipTier_id'], 'references' => ['custmembershiptiers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'custmembershiptiers_retaileremployees_ibfk_2' => ['type' => 'foreign', 'columns' => ['retailerEmployee_id'], 'references' => ['retaileremployees', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'custMembershipTier_id' => 1,
            'retailerEmployee_id' => 1
        ],
    ];
}
