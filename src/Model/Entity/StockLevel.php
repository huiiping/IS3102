<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StockLevel Entity
 *
 * @property int $id
 * @property int $location_id
 * @property int $product_id
 * @property int $threshold
 * @property string $status
 * @property int $retailer_employee_id
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\RetailerEmployee $retailer_employee
 */
class StockLevel extends Entity
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
