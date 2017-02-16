<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RetaileremployeesEmployeerole Entity
 *
 * @property int $retailerEmployee_id
 * @property int $employeeRole_id
 *
 * @property \App\Model\Entity\Retaileremployee $retaileremployee
 * @property \App\Model\Entity\Employeerole $employeerole
 */
class RetaileremployeesEmployeerole extends Entity
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
        'employeeRole_id' => false
    ];
}
