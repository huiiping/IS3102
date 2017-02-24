<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RetailerDetail Entity
 *
 * @property int $retailerid
 * @property string $retailer_name
 * @property string $retailer_desc
 * @property string $retailer_email
 * @property string $address
 * @property string $contact
 */
class RetailerDetail extends Entity
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
        'retailerid' => false
    ];
}
