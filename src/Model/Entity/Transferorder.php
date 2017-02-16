<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transferorder Entity
 *
 * @property int $id
 * @property int $locationFrom
 * @property int $locationTo
 * @property string $trasnferStatus
 * @property \Cake\I18n\Time $trasferDate
 * @property string $remarks
 * @property int $locationFrom_id
 * @property int $locationTo_id
 *
 * @property \App\Model\Entity\RetaileremployeesTransferorder[] $retaileremployees_transferorders
 * @property \App\Model\Entity\Retaileremployee[] $retaileremployees
 * @property \App\Model\Entity\Location $location
 */
class Transferorder extends Entity
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
