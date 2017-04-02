<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class DeliveryOrdersTable extends Table
{

    public $filterArgs = array(
        'search' => array(
            'type' => 'like',
            'field' => array('deliverer', 'RetailerEmployees.first_name', 'RetailerEmployees.last_name','Customers.first_name','Customers.last_name', 'Locations.name', 'Transactions.id', 'status'),
            'method' => 'findByActions'
            )
        );

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('delivery_orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Transactions', [
            'foreignKey' => 'transaction_id'
        ]);
        $this->belongsToMany('Items', [
            'foreignKey' => 'delivery_order_id',
            'targetForeignKey' => 'item_id',
            'joinTable' => 'delivery_orders_items'
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
            ->allowEmpty('status');

        $validator
            ->numeric('fee')
            ->allowEmpty('fee');

        $validator
            ->allowEmpty('deliverer');

        $validator
            ->date('delivery_date')
            ->allowEmpty('delivery_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['transaction_id'], 'Transactions'));

        return $rules;
    }
}
