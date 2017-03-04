<?php
/**
 * Created by PhpStorm.
 * User: gailee8282
 * Date: 3/4/2017
 * Time: 12:06 PM
 */

namespace App\Model\Document;

class Location extends Document
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