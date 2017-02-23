<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Retailer Entity
 *
 * @property int $id
 * @property string $retailer_name
 * @property string $retailer_desc
 * @property string $account_status
 * @property string $payment_term
 * @property string $retailer_email
 * @property string $address
 * @property string $contact
 * @property \Cake\I18n\Time $contract_start_date
 * @property \Cake\I18n\Time $contract_end_date
 * @property int $num_of_users
 * @property int $num_of_warehouses
 * @property int $num_of_stores
 * @property int $num_of_product_types
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $retailer_acc_type_id
 *
 * @property \App\Model\Entity\RetailerAccType $retailer_acc_type
 */
class Retailer extends Entity
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
