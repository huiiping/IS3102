<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $customerId
 * @property string $firstName
 * @property string $lastName
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $shippingAddress
 * @property int $contact
 * @property \Cake\I18n\Time $dateJoined
 * @property bool $activationStatus
 * @property string $membershipStatus
 * @property int $loyaltyPoints
 */
class Customer extends Entity
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
        'customerId' => false
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
