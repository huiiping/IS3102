<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property int $retailer_employee_id
 * @property string $entity
 * @property int $entityID
 * @property string $title
 * @property string $message
 * @property string $status
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\RetailerEmployee $retailer_employee
 */
class Report extends Entity
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
