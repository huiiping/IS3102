<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustMembershipTiersPromotionsFixture
 *
 */
class CustMembershipTiersPromotionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'cust_membership_tier_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'promotion_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'promotion_id' => ['type' => 'index', 'columns' => ['promotion_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['cust_membership_tier_id', 'promotion_id'], 'length' => []],
            'cust_membership_tiers_promotions_ibfk_1' => ['type' => 'foreign', 'columns' => ['cust_membership_tier_id'], 'references' => ['customers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'cust_membership_tiers_promotions_ibfk_2' => ['type' => 'foreign', 'columns' => ['promotion_id'], 'references' => ['promotions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'cust_membership_tier_id' => 1,
            'promotion_id' => 1
        ],
    ];
}
