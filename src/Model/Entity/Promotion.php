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
 * @property int $item1_id
 * @property int $item2_id
 * @property int $prodType1_id
 * @property int $prodType2_id
 * @property string $firstVouherNo
 * @property string $lastVoucherNo
 * @property float $discountRate
 * @property string $creditCardType
 * @property int $prodCat_id
 * @property int $employee_id
 *
 * @property \App\Model\Entity\LocationsPromotion[] $locations_promotions
 * @property \App\Model\Entity\Location[] $locations
 * @property \App\Model\Entity\Item1 $item1
 * @property \App\Model\Entity\Item2 $item2
 * @property \App\Model\Entity\ProdType1 $prod_type1
 * @property \App\Model\Entity\ProdType2 $prod_type2
 * @property \App\Model\Entity\Prodcat $prod_cat
 * @property \App\Model\Entity\Retaileremployee $retaileremployee
 * @property \App\Model\Entity\Transferorderitem[] $transferorderitems
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
