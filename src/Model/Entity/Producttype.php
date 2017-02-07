<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producttype Entity
 *
 * @property int $productTypeId
 * @property string $productTypeName
 * @property string $productTypeDesc
 * @property string $colour
 * @property string $dimension
 * @property float $storePrice
 * @property float $webstorePrice
 * @property string $SKU
 * @property int $locationId
 * @property int $productCategoryId
 * @property int $column_11
 */
class Producttype extends Entity
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
        'productTypeId' => false
    ];
}
