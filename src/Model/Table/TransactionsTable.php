<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transactions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $RetailerEmployees
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\HasMany $DeliveryOrders
 * @property \Cake\ORM\Association\HasMany $TransactionItems
 *
 * @method \App\Model\Entity\Transaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransactionsTable extends Table
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

        $this->setTable('transactions');
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
        $this->hasMany('DeliveryOrders', [
            'foreignKey' => 'transaction_id'
        ]);
        $this->hasMany('TransactionItems', [
            'foreignKey' => 'transaction_id'
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
            ->allowEmpty('status');

        $validator
            ->allowEmpty('remarks');

        $validator
            ->integer('receipt_number')
            ->allowEmpty('receipt_number');

        $validator
            ->numeric('gross_amount')
            ->allowEmpty('gross_amount');

        $validator
            ->numeric('nett_amount')
            ->allowEmpty('nett_amount');

        $validator
            ->numeric('member_discount')
            ->allowEmpty('member_discount');

        $validator
            ->numeric('other_discount')
            ->allowEmpty('other_discount');

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

        return $rules;
    }
}
