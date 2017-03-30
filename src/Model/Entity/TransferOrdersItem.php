<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TransferOrdersItem Entity
 *
 * @property int $transfer_order_id
 * @property int $item_id
 *
 * @property \App\Model\Entity\TransferOrder $transfer_order
 * @property \App\Model\Entity\Item $item
 */
class TransferOrdersItem extends Entity
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
        'transfer_order_id' => false,
        'item_id' => false
    ];
}
