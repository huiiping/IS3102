<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * IntrasysEmployee Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $activation_status
 * @property string $activation_token
 * @property string $recovery_status
 * @property string $recovery_token
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $contact
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\IntrasysEmployeeRole[] $intrasys_employee_roles
 */
class IntrasysEmployee extends Entity
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

    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
}
