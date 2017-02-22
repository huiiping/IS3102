<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RetailerEmployeeRole Entity
 *
 * @property int $id
 * @property string $role_name
 * @property string $role_desc
 *
 * @property \App\Model\Entity\RetailerEmployee[] $retailer_employees
 * @property \App\Model\Entity\RetailerEmployeesRetailerEmployeeRole[] $retailer_employees_retailer_employee_roles
 */
class RetailerEmployeeRole extends Entity
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
