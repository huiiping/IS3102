<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TransferOrderItem Entity
 *
 * @property int $transfer_order_id
 * @property int $item_id
 *
 * @property \App\Model\Entity\TransferOrder $transfer_order
 */
class TransferOrderItem extends Entity
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
