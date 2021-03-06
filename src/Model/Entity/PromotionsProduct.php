<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PromotionsProduct Entity
 *
 * @property int $promotion_id
 * @property int $product_id
 *
 * @property \App\Model\Entity\Promotion $promotion
 * @property \App\Model\Entity\Product $product
 */
class PromotionsProduct extends Entity
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
        'promotion_id' => false,
        'product_id' => false
    ];
}
