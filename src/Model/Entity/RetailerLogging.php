<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RetailerLogging Entity
 *
 * @property int $id
 * @property string $action
 * @property string $entity
 * @property int $entityid
 * @property int $retailer_employee_id
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\RetailerEmployee $retailer_employee
 */
class RetailerLogging extends Entity
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
