<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RetailerEmployeesRetailerEmployeeRole Entity
 *
 * @property int $retailer_employee_id
 * @property int $retailer_employee_role_id
 *
 * @property \App\Model\Entity\RetailerEmployee $retailer_employee
 * @property \App\Model\Entity\RetailerEmployeeRole $retailer_employee_role
 */
class RetailerEmployeesRetailerEmployeeRole extends Entity
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
        'retailer_employee_id' => false,
        'retailer_employee_role_id' => false
    ];
}
