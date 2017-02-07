<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Retailer Entity
 *
 * @property int $retailerId
 * @property string $retailerName
 * @property string $country
 * @property bool $activationStatus
 * @property string $accountType
 * @property string $paymentType
 * @property int $loyaltyPoints
 * @property \Cake\I18n\Time $contractStartDate
 * @property \Cake\I18n\Time $contractEndDate
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
        'retailerId' => false
    ];
}
