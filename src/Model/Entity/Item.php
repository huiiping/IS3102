<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $itemName
 * @property string $itemDesc
 * @property string $EPC
 * @property string $barcode
 * @property string $itemStatus
 * @property bool $defective
 * @property int $location_id
 * @property int $prodType_id
 * @property int $section_id
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Prodtype $prodtype
 * @property \App\Model\Entity\Section[] $sections
 * @property \App\Model\Entity\Deliveryorderitem[] $deliveryorderitems
 * @property \App\Model\Entity\Transactionitem[] $transactionitems
 * @property \App\Model\Entity\Transferorderitem[] $transferorderitems
 */
class Item extends Entity
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
