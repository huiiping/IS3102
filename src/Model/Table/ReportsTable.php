<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reports Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $Suppliers
 * @property \Cake\ORM\Association\BelongsTo $DeliveryOrders
 * @property \Cake\ORM\Association\BelongsTo $Items
 * @property \Cake\ORM\Association\HasMany $Items
 *
 * @method \App\Model\Entity\Report get($primaryKey, $options = [])
 * @method \App\Model\Entity\Report newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Report[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Report|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Report patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Report[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Report findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReportsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('reports');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RetailerEmployees', [
            'foreignKey' => 'retailer_employee_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id'
        ]);
        $this->belongsTo('DeliveryOrders', [
            'foreignKey' => 'delivery_order_id'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'report_id'
        ]);
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
            ->allowEmpty('title');

        $validator
            ->allowEmpty('message');

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
        $rules->add($rules->existsIn(['retailer_employee_id'], 'RetailerEmployees'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['delivery_order_id'], 'DeliveryOrders'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
