<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomersPromotion Entity
 *
 * @property int $customer_id
 * @property int $promotion_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Promotion $promotion
 */
class CustomersPromotion extends Entity
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
        'customer_id' => false,
        'promotion_id' => false
    ];
}
