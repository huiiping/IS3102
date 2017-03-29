<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $member_identification
 * @property string $password
 * @property string $email
 * @property \Cake\I18n\Time $dob
 * @property string $address
 * @property string $contact
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $first_name
 * @property string $last_name
 * @property string $activation_status
 * @property string $activation_token
 * @property bool $mailing_list
 * @property \Cake\I18n\Time $expiry_date
 * @property string $preferred_currency
 * @property int $cust_membership_tier_id
 *
 * @property \App\Model\Entity\CustMembershipTier $cust_membership_tier
 * @property \App\Model\Entity\Promotion[] $promotions
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
