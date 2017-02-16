<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Promotion Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $startDate
 * @property \Cake\I18n\Time $endDate
 * @property string $promoDesc
 * @property string $firstVouherNo
 * @property string $lastVoucherNo
 * @property float $discountRate
 * @property string $creditCardType
 * @property int $retailerEmployee_id
 *
 * @property \App\Model\Entity\Retaileremployee $retaileremployee
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Prodtype[] $prodtypes
 */
class Promotion extends Entity
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
