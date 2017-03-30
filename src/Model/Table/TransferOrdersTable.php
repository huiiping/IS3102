<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TransferOrders Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 * @property \Cake\ORM\Association\BelongsTo $Suppliers
 * @property \Cake\ORM\Association\BelongsToMany $Items
 *
 * @method \App\Model\Entity\TransferOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\TransferOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TransferOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TransferOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TransferOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TransferOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TransferOrder findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransferOrdersTable extends Table
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
        $this->belongsToMany('Items', [
            'foreignKey' => 'transfer_order_id',
            'targetForeignKey' => 'item_id',
            'joinTable' => 'transfer_orders_items'
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
            ->integer('locationFrom')
            ->allowEmpty('locationFrom');

        $validator
            ->integer('locationTo')
            ->allowEmpty('locationTo');

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

        return $rules;
    }
}
