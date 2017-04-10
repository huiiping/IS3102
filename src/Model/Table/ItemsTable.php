<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ItemsTable extends Table
{
    public $filterArgs = array(
        'search' => array(
            'type' => 'like',
            'field' => array('name', 'description', 'Products.prod_name', 'Locations.name', 'Sections.sec_name', 'EPC', 'status'),
            'method' => 'findByActions'
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

        $this->table('items');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id'
            ]);
        $this->belongsTo('Sections', [
            'foreignKey' => 'section_id'
            ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
            ]);

        $this->belongsToMany('Transactions', [
            'foreignKey' => 'item_id',
            'targetForeignKey' => 'transaction_id',
            'joinTable' => 'transactions_items'
            ]);
        $this->belongsToMany('DeliveryOrders', [
            'foreignKey' => 'item_id',
            'targetForeignKey' => 'delivery_order_id',
            'joinTable' => 'delivery_orders_items'
            ]);
        $this->belongsToMany('TransferOrders', [
            'foreignKey' => 'item_id',
            'targetForeignKey' => 'transfer_order_id',
            'joinTable' => 'transfer_orders_items'
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
        ->allowEmpty('description');

        $validator
        ->allowEmpty('EPC');
        // ->add('EPC', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
        ->allowEmpty('status');

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
        $rules->add($rules->isUnique(['EPC']));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['section_id'], 'Sections'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
