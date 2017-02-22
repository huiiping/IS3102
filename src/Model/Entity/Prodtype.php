<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProdType Entity
 *
 * @property int $id
 * @property string $prod_name
 * @property string $prod_desc
 * @property string $colour
 * @property string $dimension
 * @property float $store_unit_price
 * @property float $web_store_unit_price
 * @property string $SKU
 * @property int $prod_cat_id
 *
 * @property \App\Model\Entity\ProdCat $prod_cat
 * @property \App\Model\Entity\Promotion[] $promotions
 * @property \App\Model\Entity\PromotionsProdType[] $promotions_prod_types
 */
class ProdType extends Entity
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
