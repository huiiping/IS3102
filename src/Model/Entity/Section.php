<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Section Entity
 *
 * @property int $id
 * @property string $sec_name
 * @property int $space_limit
 * @property bool $reserve
 * @property int $location_id
 *
 * @property \App\Model\Entity\Location $location
 */
class Section extends Entity
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
