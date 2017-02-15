<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Prodtype Entity
 *
 * @property int $id
 * @property string $prodName
 * @property string $prodDesc
 * @property string $colour
 * @property string $dimension
 * @property float $storeUnitPrice
 * @property float $webStoreUnitPrice
 * @property string $SKU
 * @property int $employee_id
 * @property int $prodCat_id
 *
 * @property \App\Model\Entity\Retaileremployee $retaileremployee
 * @property \App\Model\Entity\Prodcat $prodcat
 */
class Prodtype extends Entity
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
