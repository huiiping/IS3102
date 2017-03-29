<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CustMembershipTiers
 * @property \Cake\ORM\Association\HasMany $DeliveryOrders
 * @property \Cake\ORM\Association\HasMany $Feedbacks
 * @property \Cake\ORM\Association\HasMany $MembershipPoints
 * @property \Cake\ORM\Association\HasMany $Transactions
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
        'search' => array(
            'type' => 'like',
            'field' => array('member_idetification','contact','first_name','last_name','activation_status', 'cust_membership_tier_id')
            )
    );

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('customers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CustMembershipTiers', [
            'foreignKey' => 'cust_membership_tier_id'
            ]);
        $this->hasMany('DeliveryOrders', [
            'foreignKey' => 'customer_id'
            ]);
        $this->hasMany('Feedbacks', [
            'foreignKey' => 'customer_id'
            ]);
        $this->hasMany('MembershipPoints', [
            'foreignKey' => 'customer_id'
            ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'customer_id'
            ]);
        $this->belongsToMany('Promotions', [
            'foreignKey' => 'customer_id',
            'targetForeignKey' => 'promotion_id',
            'joinTable' => 'customers_promotions'
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
        ->requirePresence('member_identification', 'create')
        ->notEmpty('member_identification');

        $validator
        ->requirePresence('password', 'create')
        ->notEmpty('password');

        $validator
        ->email('email')
        ->requirePresence('email', 'create')
        ->notEmpty('email');

        $validator
        ->date('dob')
        ->requirePresence('dob', 'create')
        ->notEmpty('dob');

        $validator
        ->requirePresence('address', 'create')
        ->notEmpty('address');

        $validator
        ->requirePresence('contact', 'create')
        ->notEmpty('contact');

        $validator
        ->requirePresence('first_name', 'create')
        ->notEmpty('first_name');

        $validator
        ->requirePresence('last_name', 'create')
        ->notEmpty('last_name');

        $validator
        ->allowEmpty('activation_status');

        $validator
        ->allowEmpty('activation_token');

        $validator
        ->boolean('mailing_list')
        ->allowEmpty('mailing_list');

        $validator
        ->dateTime('expiry_date')
        ->allowEmpty('expiry_date');

        $validator
        ->allowEmpty('preferred_currency');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['cust_membership_tier_id'], 'CustMembershipTiers'));

        return $rules;
    }
}
