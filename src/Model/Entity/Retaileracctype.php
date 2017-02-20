<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RetailerAccType Entity
 *
 * @property int $id
 * @property string $name
 * @property int $num_of_users
 * @property int $num_of_warehouses
 * @property int $num_of_stores
 * @property int $num_of_prod_types
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Retailer[] $retailers
 */
class RetailerAccType extends Entity
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
