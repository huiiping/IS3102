<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Suppliermemo Entity
 *
 * @property int $id
 * @property string $remarks
 * @property \Cake\I18n\Time $created
 * @property int $supplier_id
 * @property int $retailerEmployee_id
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\Retaileremployee $retaileremployee
 */
class Suppliermemo extends Entity
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
