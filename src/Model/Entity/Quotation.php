<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quotation Entity
 *
 * @property int $id
 * @property int $rfq_id
 * @property int $supplier_id
 * @property string $fileName
 * @property string $filePath
 * @property string $comments
 * @property string $status
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Rfq $rfq
 * @property \App\Model\Entity\Supplier $supplier
 */
class Quotation extends Entity
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
