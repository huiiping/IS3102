<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Retailers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RetailerAccTypes
 * @property \Cake\ORM\Association\HasMany $RetailerLoyaltyPoints
 *
 * @method \App\Model\Entity\Retailer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Retailer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Retailer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Retailer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Retailer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Retailer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Retailer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RetailersTable extends Table
{
    public static function defaultConnectionName() {
        return 'intrasysdb';
    }
    
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('retailers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RetailerAccTypes', [
            'foreignKey' => 'retailer_acc_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('RetailerLoyaltyPoints', [
            'foreignKey' => 'retailer_id'
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
            ->requirePresence('retailer_name', 'create')
            ->notEmpty('retailer_name');

        $validator
            ->allowEmpty('retailer_desc');

        $validator
            ->allowEmpty('account_status');

        $validator
            ->allowEmpty('payment_term');

        $validator
            ->requirePresence('retailer_email', 'create')
            ->notEmpty('retailer_email');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        $validator
            ->dateTime('contract_start_date')
            ->requirePresence('contract_start_date', 'create')
            ->notEmpty('contract_start_date');

        $validator
            ->dateTime('contract_end_date')
            ->requirePresence('contract_end_date', 'create')
            ->notEmpty('contract_end_date');

        $validator
            ->integer('num_of_users')
            ->allowEmpty('num_of_users');

        $validator
            ->integer('num_of_warehouses')
            ->allowEmpty('num_of_warehouses');

        $validator
            ->integer('num_of_stores')
            ->allowEmpty('num_of_stores');

        $validator
            ->integer('num_of_product_types')
            ->allowEmpty('num_of_product_types');

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
        $rules->add($rules->existsIn(['retailer_acc_type_id'], 'RetailerAccTypes'));

        return $rules;
    }
}
