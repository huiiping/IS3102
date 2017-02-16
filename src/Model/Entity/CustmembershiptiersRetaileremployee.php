<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustmembershiptiersRetaileremployee Entity
 *
 * @property int $custMembershipTier_id
 * @property int $retailerEmployee_id
 *
 * @property \App\Model\Entity\Custmembershiptier $custmembershiptier
 * @property \App\Model\Entity\Retaileremployee $retaileremployee
 */
class CustmembershiptiersRetaileremployee extends Entity
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
        'custMembershipTier_id' => false,
        'retailerEmployee_id' => false
    ];
}
