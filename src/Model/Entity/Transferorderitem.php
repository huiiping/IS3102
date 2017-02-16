<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transferorderitem Entity
 *
 * @property int $id
 * @property int $item_id
 * @property string $ECP
 * @property string $barcode
 * @property int $quantity
 * @property int $transferOrder_id
 * @property int $promotion_id
 *
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\Transferorder $transferorder
 * @property \App\Model\Entity\Promotion $promotion
 */
class Transferorderitem extends Entity
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
