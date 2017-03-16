<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property string $status
 * @property string $remarks
 * @property int $receipt_number
 * @property int $customer_id
 * @property int $retailer_employee_id
 * @property int $location_id
 * @property float $gross_amount
 * @property float $nett_amount
 * @property float $member_discount
 * @property float $other_discount
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\RetailerEmployee $retailer_employee
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\DeliveryOrder[] $delivery_orders
 */
class Transaction extends Entity
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
