<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DeliveryOrder Entity
 *
 * @property int $id
 * @property string $status
 * @property float $fee
 * @property string $currency
 * @property string $deliverer
 * @property int $customer_id
 * @property int $retailer_employee_id
 * @property int $location_id
 * @property int $transaction_id
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\RetailerEmployee $retailer_employee
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\DeliveryOrderItem[] $delivery_order_items
 */
class DeliveryOrder extends Entity
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
