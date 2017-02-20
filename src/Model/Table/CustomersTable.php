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
 * @property \Cake\ORM\Association\BelongsToMany $Promotions
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


    public $filterArgs = array(
        'id' => array(
            'type' => 'like',
            'field' => 'id'
        ),
        'username' => array(
            'type' => 'like',
            'field' => 'username'
        ),
        'password' => array(
            'type' => 'like',
            'field' => 'password'
        ),
        'email' => array(
            'type' => 'like',
            'field' => 'email'
        ),
        'address' => array(
            'type' => 'like',
            'field' => 'address'
        ),
        'contact' => array(
            'type' => 'like',
            'field' => 'contact'
        ),
        'created' => array(
            'type' => 'like',
            'field' => 'created'
        ),
        'modified' => array(
            'type' => 'like',
            'field' => 'modified'
        ),
        'firstName' => array(
            'type' => 'like',
            'field' => 'firstName'
        ),
        'lastName' => array(
            'type' => 'like',
            'field' => 'lastName'
        ),
        'accountStatus' => array(
            'type' => 'like',
            'field' => 'accountStatus'
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

        $this->table('customers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Custmembershiptiers', [
            'foreignKey' => 'custMembershipTier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Promotions', [
            'foreignKey' => 'customer_id',
            'targetForeignKey' => 'promotion_id',
            'joinTable' => 'customers_promotions'
        ]);
        $this->addBehavior('Search.Searchable');
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
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        $validator
            ->requirePresence('firstName', 'create')
            ->notEmpty('firstName');

        $validator
            ->requirePresence('lastName', 'create')
            ->notEmpty('lastName');

        $validator
            ->allowEmpty('accountStatus');

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
