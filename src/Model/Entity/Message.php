<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property string $title
 * @property \Cake\I18n\Time $dateCreated
 * @property string $message
 * @property int $receiver
 * @property int $sender
 * @property bool $status
 * @property string $reference_id
 * @property int $employee_id
 *
 * @property \App\Model\Entity\Reference $reference
 * @property \App\Model\Entity\Retaileremployee $retaileremployee
 */
class Message extends Entity
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
