<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Intrasysemployeerole Entity
 *
 * @property int $id
 * @property string $roleName
 * @property string $roleDesc
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Intrasysemployee[] $intrasysemployees
 */
class Intrasysemployeerole extends Entity
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
