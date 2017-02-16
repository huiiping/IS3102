<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stocklevel Entity
 *
 * @property int $id
 * @property int $minThresholdLevel
 * @property bool $triggered
 * @property string $notificationMsg
 * @property string $receiver
 * @property int $location_id
 * @property int $prodType_id
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Prodtype $prodtype
 */
class Stocklevel extends Entity
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