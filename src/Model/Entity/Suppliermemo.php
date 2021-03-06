<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SupplierMemo Entity
 *
 * @property int $id
 * @property string $remarks
 * @property \Cake\I18n\Time $created
 * @property int $supplier_id
 * @property int $retailer_employee_id
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\RetailerEmployee $retailer_employee
 */
class SupplierMemo extends Entity
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
