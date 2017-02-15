<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Custmembershiptiers
 * @property \Cake\ORM\Association\HasMany $Membershippoints
 * @property \Cake\ORM\Association\HasMany $Transactions
 * @property \Cake\ORM\Association\BelongsToMany $Promotionemails
 * @property \Cake\ORM\Association\BelongsToMany $Retaileremployees
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CustomersTable extends Table
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

        $this->table('customers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Custmembershiptiers', [
            'foreignKey' => 'custMembershipTier_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Membershippoints', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsToMany('Promotionemails', [
            'foreignKey' => 'customer_id',
            'targetForeignKey' => 'promotionemail_id',
            'joinTable' => 'customers_promotionemails'
        ]);
        $this->belongsToMany('Retaileremployees', [
            'foreignKey' => 'customer_id',
            'targetForeignKey' => 'retaileremployee_id',
            'joinTable' => 'customers_retaileremployees'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->integer('contact')
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        $validator
            ->requirePresence('firstName', 'create')
            ->notEmpty('firstName');

        $validator
            ->requirePresence('lastName', 'create')
            ->notEmpty('lastName');

        $validator
            ->boolean('activationStatus')
            ->allowEmpty('activationStatus');

        $validator
            ->boolean('mailingList')
            ->allowEmpty('mailingList');

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
        $rules->add($rules->existsIn(['custMembershipTier_id'], 'Custmembershiptiers'));

        return $rules;
    }
}
