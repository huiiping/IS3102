<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $itemId
 * @property string $itemDesc
 * @property string $EPC
 * @property string $barcode
 * @property string $itemStatus
 * @property bool $isDefective
 * @property int $productCategoryId
 * @property int $productTypeId
 * @property int $locationId
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
        'itemId' => false
    ];
}
