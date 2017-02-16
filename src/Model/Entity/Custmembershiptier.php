<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Custmembershiptier Entity
 *
 * @property int $id
 * @property string $teirName
 * @property int $validityPeriod
 * @property float $minSpending
 * @property float $membershipFee
 * @property float $membershipPts
 * @property int $redemptionPts
 * @property float $discountRate
 * @property float $birthdayRate
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Retaileremployee[] $retaileremployees
 */
class Custmembershiptier extends Entity
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