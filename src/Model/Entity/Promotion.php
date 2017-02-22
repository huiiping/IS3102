<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Promotion Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property string $promo_desc
 * @property string $first_vouher_num
 * @property string $last_voucher_num
 * @property float $discount_rate
 * @property string $credit_card_type
 * @property int $retailer_employee_id
 *
 * @property \App\Model\Entity\RetailerEmployee $retailer_employee
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\ProdType[] $prod_types
 * @property \App\Model\Entity\CustomersPromotion[] $customers_promotions
 * @property \App\Model\Entity\PromotionsProdType[] $promotions_prod_types
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
