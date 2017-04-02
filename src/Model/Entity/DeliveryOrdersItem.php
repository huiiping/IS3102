<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DeliveryOrdersItem Entity
 *
 * @property int $delivery_order_id
 * @property int $item_id
 *
 * @property \App\Model\Entity\DeliveryOrder $delivery_order
 * @property \App\Model\Entity\Item $item
 */
class DeliveryOrdersItem extends Entity
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
        'delivery_order_id' => false,
        'item_id' => false
    ];
}
