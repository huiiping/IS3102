<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property string $title
 * @property \Cake\I18n\Time $date_created
 * @property string $message
 * @property bool $status
 * @property string $attachment
 * @property int $attachmentID
 * @property int $sender_id
 *
 * @property \App\Model\Entity\RetailerEmployee[] $retailer_employees
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
