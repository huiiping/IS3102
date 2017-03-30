<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $prod_name
 * @property string $prod_desc
 * @property float $store_unit_price
 * @property float $web_store_unit_price
 * @property string $SKU
 * @property string $barcode
 * @property int $prod_cat_id
 *
 * @property \App\Model\Entity\ProdCat $prod_cat
 * @property \App\Model\Entity\ProdSpecification[] $prod_specifications
 * @property \App\Model\Entity\Promotion[] $promotions
 */
class Product extends Entity
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
