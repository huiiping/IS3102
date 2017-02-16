<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property string $transactionStatus
 * @property \Cake\I18n\Time $dateCreated
 * @property float $totalAmt
 * @property string $remarks
 * @property int $referenceID
 * @property int $location_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\RetaileremployeesTransaction[] $retaileremployees_transactions
 * @property \App\Model\Entity\Retaileremployee[] $retaileremployees
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Deliveryorder[] $deliveryorders
 * @property \App\Model\Entity\Transactionitem[] $transactionitems
 */
class Transaction extends Entity
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
