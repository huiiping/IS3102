<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseOrder Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property float $total_price
 * @property string $approval_status
 * @property bool $delivery_status
 * @property string $comments
 * @property int $supplier_id
 * @property int $retailer_employee_id
 * @property int $location_id
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\RetailerEmployee $retailer_employee
 * @property \App\Model\Entity\PurchaseOrderItem[] $purchase_order_items
 */
class PurchaseOrder extends Entity
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
