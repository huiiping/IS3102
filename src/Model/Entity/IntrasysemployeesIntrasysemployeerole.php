<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IntrasysEmployeesIntrasysEmployeeRole Entity
 *
 * @property int $intrasys_employee_id
 * @property int $intrasys_employee_role_id
 *
 * @property \App\Model\Entity\IntrasysEmployee $intrasys_employee
 * @property \App\Model\Entity\IntrasysEmployeeRole $intrasys_employee_role
 */
class IntrasysEmployeesIntrasysEmployeeRole extends Entity
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
        'intrasys_employee_id' => false,
        'intrasys_employee_role_id' => false
    ];
}
