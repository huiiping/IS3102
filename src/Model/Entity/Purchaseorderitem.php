<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Purchaseorderitem Entity
 *
 * @property int $id
 * @property int $itemID
 * @property string $itemName
 * @property string $itemDesc
 * @property int $quantity
 * @property float $unitPrice
 * @property float $subTotalPrice
 * @property int $purchaseOrder_id
 *
 * @property \App\Model\Entity\Purchaseorder $purchaseorder
 */
class Purchaseorderitem extends Entity
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
