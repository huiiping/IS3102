<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $EPC
 * @property string $status
 * @property int $product_id
 * @property int $section_id
 * @property int $location_id
 *
 * @property \App\Model\Entity\Report[] $reports
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\DeliveryOrderItem[] $delivery_order_items
 * @property \App\Model\Entity\Feedback[] $feedbacks
 * @property \App\Model\Entity\TransactionItem[] $transaction_items
 * @property \App\Model\Entity\TransferOrderItem[] $transfer_order_items
 */
class Item extends Entity
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
