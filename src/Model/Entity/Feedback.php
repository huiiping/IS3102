<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Feedback Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $customer_first_name
 * @property string $customer_last_name
 * @property int $customer_contact
 * @property string $customer_email
 * @property string $message
 * @property string $status
 * @property int $product_id
 * @property int $item_id
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Item $item
 */
class Feedback extends Entity
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
