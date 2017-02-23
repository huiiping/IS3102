<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RetailerAccTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Retailers
 *
 * @method \App\Model\Entity\RetailerAccType get($primaryKey, $options = [])
 * @method \App\Model\Entity\RetailerAccType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RetailerAccType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RetailerAccType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RetailerAccType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerAccType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RetailerAccType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RetailerAccTypesTable extends Table
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

        $this->table('retailer_acc_types');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Retailers', [
            'foreignKey' => 'retailer_acc_type_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
