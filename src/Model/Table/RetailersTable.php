<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Retailers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Retaileracctypes
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

        $this->belongsTo('Retaileracctypes', [
            'foreignKey' => 'retailerAccType_id',
            'joinType' => 'INNER'
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
            ->requirePresence('companyName', 'create')
            ->notEmpty('companyName');

        $validator
            ->allowEmpty('companyDesc');

        $validator
            ->allowEmpty('lastName');

        $validator
            ->boolean('activationStatus')
            ->allowEmpty('activationStatus');

        $validator
            ->allowEmpty('paymentTerm');

        $validator
            ->integer('loyaltyPoints')
            ->allowEmpty('loyaltyPoints');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->integer('contact')
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        $validator
            ->dateTime('contractStartDate')
            ->requirePresence('contractStartDate', 'create')
            ->notEmpty('contractStartDate');

        $validator
            ->dateTime('contractEndDate')
            ->requirePresence('contractEndDate', 'create')
            ->notEmpty('contractEndDate');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['retailerAccType_id'], 'Retaileracctypes'));

        return $rules;
    }
}
