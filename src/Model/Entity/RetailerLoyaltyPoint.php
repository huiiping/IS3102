<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RetailerLoyaltyPoint Entity
 *
 * @property int $id
 * @property int $loyalty_pts
 * @property int $redemption_pts
 * @property string $remarks
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $retailer_id
 * @property int $intrasys_employee_id
 *
 * @property \App\Model\Entity\Retailer $retailer
 * @property \App\Model\Entity\IntrasysEmployee $intrasys_employee
 */
class RetailerLoyaltyPoint extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
