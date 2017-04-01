<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AnnouncementRecipient Entity
 *
 * @property int $announcement_id
 * @property int $intrasys_employee_id
 * @property bool $is_read
 *
 * @property \App\Model\Entity\Announcement $announcement
 * @property \App\Model\Entity\IntrasysEmployee $intrasys_employee
 */
class AnnouncementRecipient extends Entity
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
        'announcement_id' => false,
        'intrasys_employee_id' => false
    ];
}
