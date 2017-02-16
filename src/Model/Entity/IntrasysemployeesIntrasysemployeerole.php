<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IntrasysemployeesIntrasysemployeerole Entity
 *
 * @property int $intrasysEmployee_id
 * @property int $intrasysEmployeeRole_id
 *
 * @property \App\Model\Entity\Intrasysemployee $intrasysemployee
 * @property \App\Model\Entity\Intrasysemployeerole $intrasysemployeerole
 */
class IntrasysemployeesIntrasysemployeerole extends Entity
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
        'intrasysEmployee_id' => false,
        'intrasysEmployeeRole_id' => false
    ];
}
