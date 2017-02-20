<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RetailerEmployee Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $address
 * @property string $contact
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $first_name
 * @property string $last_name
 * @property string $account_status
 * @property int $location_id
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Promotion[] $promotions
 * @property \App\Model\Entity\PurchaseOrder[] $purchase_orders
 * @property \App\Model\Entity\SupplierMemo[] $supplier_memos
 * @property \App\Model\Entity\Message[] $messages
 * @property \App\Model\Entity\RetailerEmployeeRole[] $retailer_employee_roles
 */
class RetailerEmployee extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
