<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Custmembershiptier Entity
 *
 * @property int $id
 * @property string $tierName
 * @property int $validityPeriod
 * @property string $minSpending
 * @property string $membershipFee
 * @property int $membershipPts
 * @property int $redemptionPts
 * @property string $discountRate
 * @property string $birthdayRate
 * @property string $description
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
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
