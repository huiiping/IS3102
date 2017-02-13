<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Retailer Entity
 *
 * @property int $id
 * @property string $company_name
 * @property string $company_desc
 * @property string $last_name
 * @property bool $activation_status
 * @property string $payment_term
 * @property int $loyalty_points
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $address
 * @property int $contact
 * @property \Cake\I18n\Time $contractStartDate
 * @property \Cake\I18n\Time $contractEndDate
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $retaileracctype_id
 *
 * @property \App\Model\Entity\Retaileracctype $retaileracctype
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
