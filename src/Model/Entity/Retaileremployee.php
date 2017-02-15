<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Retaileremployee Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $address
 * @property int $contact
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $firstName
 * @property string $lastName
 * @property bool $activationStatus
 * @property int $location_id
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Custmembershiptier[] $custmembershiptiers
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Employeerole[] $employeeroles
 * @property \App\Model\Entity\Suppliermemo[] $suppliermemos
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\Transferorder[] $transferorders
 */
class Retaileremployee extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
