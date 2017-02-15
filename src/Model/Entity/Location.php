<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property int $contact
 * @property string $type
 *
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\Retaileremployee[] $retaileremployees
 * @property \App\Model\Entity\Section[] $sections
 * @property \App\Model\Entity\Stocklevel[] $stocklevels
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\Promotion[] $promotions
 */
class Location extends Entity
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
