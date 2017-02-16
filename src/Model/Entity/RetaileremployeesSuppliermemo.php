<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RetaileremployeesSuppliermemo Entity
 *
 * @property int $retailerEmployee_id
 * @property int $supplierMemo_id
 *
 * @property \App\Model\Entity\Suppliermemo $suppliermemo
 * @property \App\Model\Entity\Retaileremployee $retaileremployee
 */
class RetaileremployeesSuppliermemo extends Entity
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
        'retailerEmployee_id' => false,
        'supplierMemo_id' => false
    ];
}
