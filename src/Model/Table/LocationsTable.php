<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class LocationsTable extends Table
{
    public $filterArgs = array(
        'search' => array(
            'type' => 'like',
            'field' => array('name', 'address', 'contact', 'type')
        )
    );

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('locations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('DeliveryOrders', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Inventory', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('PurchaseOrders', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Reports', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('RetailerEmployees', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Sections', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('StockLevels', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'location_id'
        ]);
        $this->addBehavior('Searchable');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('contact');

        $validator
            ->allowEmpty('type');

        return $validator;
    }
}
