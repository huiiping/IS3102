<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PromotionEmail Entity
 *
 * @property int $id
 * @property int $promotion_id
 * @property int $cust_membership_tier_id
 * @property string $title
 * @property string $body
 * @property \Cake\I18n\Time $last_sent
 * @property int $number_of_sends
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Promotion $promotion
 * @property \App\Model\Entity\CustMembershipTier $cust_membership_tier
 */
class PromotionEmail extends Entity
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
