<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class TransferOrdersTable extends Table
{

    public $filterArgs = array(
        'search' => array(
            'type' => 'like',
            'field' => array('locationFrom','locationTo','status','Suppliers.supplier_name')
            )
    );

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('transfer_orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'locationFrom'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'locationTo'
        ]);
        $this->belongsToMany('Items', [
            'foreignKey' => 'transfer_order_id',
            'targetForeignKey' => 'item_id',
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
            ->allowEmpty('status');

        $validator
            ->allowEmpty('remarks');

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
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['locationFrom'], 'Locations'));
        $rules->add($rules->existsIn(['locationTo'], 'Locations'));

        return $rules;
    }
}
