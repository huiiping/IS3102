<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventory Entity
 *
 * @property int $id
 * @property int $prod_type_id
 * @property string $SKU
 * @property int $quantity
 * @property int $section_id
 * @property int $location_id
 *
 * @property \App\Model\Entity\ProdType $prod_type
 * @property \App\Model\Entity\Section $section
 * @property \App\Model\Entity\Location $location
 */
class Inventory extends Entity
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
